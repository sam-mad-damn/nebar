<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/header.php";

use App\models\Product;
?>

<div class="container">
    <div class="row justify-content-center text-center mt-5">
        <h3>Бронирование № <?=$_GET["id"]?></h3>
        <a href="/app/tables/admin/book/book.php" class=" btn col-2">← Обратно</a>
    </div>
    <?php if(empty($products)): ?>
        <div class="row justify-content-center text-center">
        <h5 class="col-6 mt-5">В бронировании ничего нет</h5>
        </div>
        <?php else: ?>
    <div class="row justify-content-center text-center">
        <table class="table col-8 g-3 ">
            <tr class="shapka">
                <th>Изображение</th>
                <th>Наименование</th>
                <th>Цена</th>
                <th>Вес</th>
                <th>Кол-во</th>
                <th>Стоимость</th>
                <th>категория</th>
                
            </tr>
            
            <?php foreach ($products as $res) : ?>
                <tr>
                    <td><img src="/upload/<?= $res->image ?>" width="100" height="80" alt=""></td>
                    <td><?= $res->name ?></td>
                    <td><?=$res->price?> ₽</td>

                    <td>
                        <?= $res->value ?> Ml
                    </td>
                    <td><?= $res->count ?></td>
                    <td>
                        <?= $res->price_position ?> ₽
                    </td>

                    <td><?= $res->category ?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td class="table-primary"></td>
                <td class="table-primary">Стоимость:</td>
                <td class="table-primary"> <?= Product::totalPrice($_GET["id"])?> ₽</td>
                <td class="table-primary">Кол-во:</td>
                <td class="table-primary"><?= Product::totalCount($_GET["id"])?> шт.</td>
            </tr>
        </table>
    </div>
    <?php endif; ?>

</div>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/footer.php"; ?>