<?php

namespace App\models;

use App\helpers\Connection;
use PDO;

class Product
{

    //транзакция для добавления продукта
    public static function create($data, $img)
    {
        //установим подключение для работы с транзакцией
        $conn = Connection::make();

        //транзакция 
        try {
            //открываем транзакцию
            $conn->beginTransaction();

            //1. создаем новый продукт
            $product_id = self::insertProduct($data, $img, $conn);
           
            //2. создаем запись в таблице вес по продукту 
            self::insertWeightProduct($product_id, $data["price"], $data["weight"], $conn);

            //принимаем транзакцию
            $conn->commit();
        } catch (\PDOException $error) {

            //откатываем транзакцию в случае ошибки
            $conn->rollBack();
            echo "Ошибка" . $error->getMessage();
        }
    }

    public static function insertProduct($data, $img, $conn)
    {
        $query = $conn->prepare("INSERT INTO products (name,price,image,description,category_id, created_at) VALUES (:name,:price,:image,:description,:category, :create)");
        $query->execute([
            "name" => $data["name"],
            "price" => $data["price"],
            "image" => $img,
            "description" => $data["description"],
            "category" => $data["category"],
            "create" => date("Y-m-d H:i:s")
        ]);
        return $conn->lastInsertId();
    }
    private static function getParams($arr, $value)
    {
        return implode(", ", array_fill(0, count($arr), $value));
    }
    public static function insertWeightProduct($product_id, $price, $weight, $conn)
    {
        // $product=self::findPrice($product_id);
        $params = self::getParams($weight, "(?,?,?)");
        $queryBase = "INSERT INTO `weight_products`(`product_id`, `weight_id`, `price`) VALUES ";
        $queryBase .= $params;
        $values = [];
        foreach ($weight as $item) {
            $value = self::findWeight($item);

            $values[] = $product_id;
            $values[] = $item;
            $values[] = $price / 100 * $value;
        }

        $query = $conn->prepare($queryBase);
        $query->execute($values);
    }

    public static function findPrice($id)
    {
        $query = Connection::make()->prepare("SELECT price FROM products WHERE id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch(PDO::FETCH_COLUMN);
    }
    public static function findWeight($id)
    {
        $query = Connection::make()->prepare("SELECT value FROM `weights` WHERE id=:id");
        $query->execute(["id" => $id]);
        return $query->fetch(PDO::FETCH_COLUMN);
    }


    //достаем наши приемущества
    public static function showLast()
    {
        $query = Connection::make()->query("SELECT * FROM products  ORDER BY created_at ASC LIMIT 1");
        return $query->fetch();
    }

    //вывод всех продуктов у админа
    public static function allAdmin()
    {
        $query = Connection::make()->query("SELECT products.*, categories.name AS category FROM products
        INNER JOIN categories ON categories.id = category_id");
        return $query->fetchAll();
    }

    //вывод веса и цены всех продуктов у админа
    public static function weightAndPrice($product_id)
    {
        $query = Connection::make()->prepare("SELECT weights.value as weight, weight_products.price as weightPrice
        FROM weight_products 
        INNER JOIN weights ON weights.id = weight_products.weight_id
        WHERE weight_products.product_id = :product_id
        ");
        $query->execute(["product_id" => $product_id]);
        return $query->fetchAll();
    }

    //поиск товара по id 
    public static function findId($product_id)
    {
        $query = Connection::make()->prepare("SELECT products.*, categories.name AS category FROM products
        INNER JOIN categories ON categories.id = category_id WHERE products.id = :product_id");
        $query->execute(["product_id" => $product_id]);
        return $query->fetch();
    }

    //обновление описания
    public static function updateDescription($descr, $id)
    {
        $query = Connection::make()->prepare("UPDATE products SET description = :descr WHERE products.id = :product_id");
        $query->execute(["descr" => $descr, "product_id" => $id]);
    }

    //обновление продукта в целом
    public static function updateProd($data, $img)
    {
        $query = Connection::make()->prepare("UPDATE products SET name = :name, price = :price, image =:image, category_id = :category, description = :descr WHERE products.id = :product_id");
        $query->execute([
            "name" => $data["name"],
            "price" => $data["price"],
            "image" => $img,
            "category" => $data["category"],
            "descr" => $data["description"],
            "product_id" => $data["id"]
        ]);
        foreach ($data["weight"] as $item) {
            self::updateWeight($data["id"], $item, $data["price"]);
        }
    }

    //поиск веса по ид продукта
    public static function findWeightProd($id,$weight)
    {
        $query = Connection::make()->prepare("SELECT weight_id, product_id FROM weight_products WHERE product_id = :id AND weight_id = :weight");
        $query->execute(["id" => $id, "weight"=> $weight]);
        return $query->fetch();
    }

    //обновление веса по продукту
    public static function updateWeight($product_id, $weight, $price)
    {
        $weightArr = self::findWeightProd($product_id, $weight);
        $value = self::findWeight($weight);
        if ($weightArr) {
            
            
            $query =  Connection::make()->prepare("UPDATE `weight_products` SET `price`=? WHERE product_id = ? AND weight_id =?");
            $query->execute([$price / 100 * $value, $product_id, $weight]);
        } else {
            
            $query = Connection::make()->prepare("INSERT INTO weight_products (product_id, weight_id, price) VALUES (?,?,?)");
            $query->execute([$product_id, $weight, $price / 100 * $value]);
        }
    }

    //вывод всех продуктов по категории
    public static function all($category)
    {
        $query = Connection::make()->prepare("SELECT DISTINCT weight_products.price AS priceP, weights.value AS weight, products.*, categories.name AS category FROM products
        INNER JOIN categories ON categories.id = category_id
        INNER JOIN weight_products ON weight_products.product_id = products.id 
        INNER JOIN weights ON weights.id = weight_products.weight_id
        WHERE category_id = :category_id");

        $query->execute(["category_id" => $category]);
        return $query->fetchAll();
    }

    //вывод всех продуктов по категории
    public static function productsByCategory($category)
    {
        $query = Connection::make()->prepare("SELECT products.*, categories.name AS category FROM products
        INNER JOIN categories ON categories.id = category_id
        WHERE category_id = :category_id");

        $query->execute(["category_id" => $category]);
        return $query->fetchAll();
    }

    //вывод цен продукта
    public static function pricesByProduct($product)
    {
        $query = Connection::make()->prepare("SELECT weight_products.price AS price, weights.value AS weight, weight_id
        FROM weight_products 
        INNER JOIN weights ON weights.id = weight_products.weight_id
        WHERE product_id = :product_id");

        $query->execute(["product_id" => $product]);
        return $query->fetchAll();
    }

    //поиск блюда в бронировании
    public static function find($product_id, $weight_id, $table_reservation_id)
    {
        $query = Connection::make()->prepare("SELECT order_products.*, weight_products.price as price, order_products.count*weight_products.price as price_position , products.name as name
        FROM order_products, weight_products, products
        WHERE products.id = weight_products.product_id AND  order_products.product_id= weight_products.product_id
        AND order_products.product_id = :product_id 
        AND order_products.table_reservation_id = :table_reservation_id 
        AND order_products.weight_id = :weight_id");
        $query->execute([
            "product_id" => $product_id,
            "table_reservation_id" => $table_reservation_id,
            "weight_id" => $weight_id
        ]);
        return $query->fetch();
    }

    //добавить продукт к заказу
    public static function addProduct($data, $table)
    {
        $dish = self::find($data["id"], $data["weight-" . $data['id']], $table);

        if (!$dish) {
            $query = Connection::make()->prepare("INSERT INTO order_products
            (count, weight_id, product_id, table_reservation_id) 
            VALUES (1, :weight_id, :product_id, :tables_reservation_id)");

            $query->execute([
                ":weight_id" => $data["weight-" . $data['id']],
                ":product_id" => $data["id"],
                ":tables_reservation_id" => $table
            ]);
        } else {
            if ($dish->count >= 1) {
                $query = Connection::make()->prepare("UPDATE `order_products`SET count = count+1 WHERE weight_id = :weight_id AND product_id =:product_id AND table_reservation_id = :tables_reservation_id");
                $query->execute([
                    ":weight_id" => $data["weight-" . $data['id']],
                    ":product_id" => $data["id"],
                    "tables_reservation_id" => $table
                ]);
            }
        }

        return self::find($data["id"], $data["weight-" . $data['id']], $table);
    }

    public static function allOrder($table)
    {
        $query = Connection::make()->prepare("SELECT order_products.count as count,
        weights.value,
        products.name as name 
        FROM order_products 
        INNER JOIN weight_products ON weight_products.product_id = order_products.product_id 
        AND weight_products.weight_id = order_products.weight_id
        INNER JOIN weights ON weights.id = weight_products.weight_id 
        INNER JOIN products ON products.id = weight_products.product_id
        WHERE order_products.table_reservation_id = :table
        ");
        $query->execute(["table" => $table]);
        return $query->fetchAll();
    }

    public static function totalCount($id)
    {

        $query = Connection::make()->prepare("SELECT SUM(order_products.count) as sum
        FROM order_products
        WHERE order_products.table_reservation_id = :id
        GROUP BY order_products.table_reservation_id");
        $query->execute(["id" => $id]);
        return $query->fetch(\PDO::FETCH_COLUMN);
    }
    public static function totalPrice($id)
    {
        $query = Connection::make()->prepare("SELECT SUM(order_products.count*weight_products.price) as sum
        FROM order_products, weight_products
        WHERE order_products.table_reservation_id = :id AND order_products.product_id = weight_products.product_id AND order_products.weight_id = weight_products.weight_id
        GROUP BY order_products.table_reservation_id");
        $query->execute(["id" => $id]);
        return $query->fetch(\PDO::FETCH_COLUMN);
    }

    public static function allInOrder($table)
    {
        $query = Connection::make()->prepare("SELECT order_products.*,
         products.image, weight_products.price, products.name as name, order_products.count*weight_products.price as price_position, weights.value, categories.name as category
        FROM order_products 
        INNER JOIN weight_products ON weight_products.product_id = order_products.product_id AND weight_products.weight_id = order_products.weight_id
        INNER JOIN weights ON weights.id = weight_products.weight_id 
        INNER JOIN products ON products.id = weight_products.product_id
        INNER JOIN categories ON categories.id = products.category_id
        WHERE order_products.table_reservation_id = :table
        ");
        $query->execute(["table" => $table]);
        return $query->fetchAll();
    }

    public static function findOrder($product_id, $weight_id, $table_reservation_id)
    {
        $query = Connection::make()->prepare("SELECT order_products.*, weight_products.price as price, order_products.count*weight_products.price as price_position , products.name as name
        FROM order_products, weight_products, products
        WHERE order_products.product_id= weight_products.product_id  
        AND order_products.weight_id = weight_products.weight_id
        AND products.id = weight_products.product_id
        AND order_products.product_id = :product_id
        AND order_products.table_reservation_id = :table_reservation_id 
        AND order_products.weight_id = :weight_id");
        $query->execute([
            "product_id" => $product_id,
            "table_reservation_id" => $table_reservation_id,
            "weight_id" => $weight_id
        ]);
        return $query->fetch();
    }

    public static function add($table, $weight_id, $product_id)
    {
        $products = self::findOrder($product_id, $weight_id, $table);
        if ($products->count >= 1) {
            $query = Connection::make()->prepare("UPDATE `order_products`SET count = count+1 WHERE weight_id = :weight_id AND product_id =:product_id AND table_reservation_id = :tables_reservation_id");
            $query->execute([
                ":weight_id" => $weight_id,
                ":product_id" => $product_id,
                "tables_reservation_id" => $table
            ]);
        }
        return self::findOrder($product_id, $weight_id, $table);
    }

    public static function dec($table, $weight_id, $product_id)
    {
        $products = self::findOrder($product_id, $weight_id, $table);
        if ($products->count > 1) {
            $query = Connection::make()->prepare("UPDATE `order_products`SET count = count-1 WHERE weight_id = :weight_id AND product_id =:product_id AND table_reservation_id = :tables_reservation_id");
            $query->execute([
                ":weight_id" => $weight_id,
                ":product_id" => $product_id,
                "tables_reservation_id" => $table
            ]);
        }
        return self::findOrder($product_id, $weight_id, $table);
    }

    public static function deletePosition($table, $weight_id, $product_id)
    {
        $query = Connection::make()->prepare("DELETE FROM order_products 
        WHERE product_id = :product_id 
        AND weight_id = :weight_id
        AND table_reservation_id = :table_id
        ");
        $query->execute(["product_id" => $product_id, "weight_id" => $weight_id, "table_id" => $table]);
        return "delete";
    }

    public static function clear($table)
    {
        $query = Connection::make()->prepare("DELETE FROM order_products WHERE table_reservation_id = :table_reserv");
        $query->execute(["table_reserv" => $table]);
        return "clear";
    }

    //вывод категорий для селекта при добавлении продукта со стороны админа
    public static function category()
    {
        $query = Connection::make()->query("SELECT * FROM categories");
        return $query->fetchAll();
    }

    //вывод веса, для чекбоксов при добалении продукта со стороны админа
    public static function weight()
    {
        $query = Connection::make()->query("SELECT * FROM weights");
        return $query->fetchAll();
    }

    //удаление продукта из меню
    public static function delete($id)
    {
        $query = Connection::make()->prepare("DELETE FROM products WHERE id = :id");
        $query->execute(["id" => $id]);
    }
}

// (SELECT id FROM tables_reservation WHERE user_id = :user_id AND tables_reservation.id = :tables_reservation_id)