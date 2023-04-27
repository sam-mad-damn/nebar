<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/header.php";

use App\models\Product;
?>

<div class="container">
    <div class="row justify-content-center mt-5 navvvv">
        <form class="col-7" action="/app/tables/admin/menu/menu.php">
            <button class="btn sort" name="all">ВСЕ</button>
            <button class="btn sort" name="drink">НАПИТКИ</button>
            <button class="btn sort" name="dish">ЗАКУСКИ</button>
        </form>
        <form class="col-4" action="/app/tables/admin/menu/insert.php"><button class="btn btn-success" name="insert">ДОБАВИТЬ</button></form>

    </div>
    <div class="row justify-content-center text-center">
        <table class="table col-8 g-2 conteiner-orders">
            <tr class="shapka">
                <th>Изображение</th>
                <th>Наименование</th>
                <th>Вес</th>
                <th>Цена</th>
                <th>категория</th>
                <th> </th>
            </tr>
            <?php foreach ($products as $res) : ?>
                <tr>
                    <td><img src="/upload/<?= $res->image ?>" width="100" height="80" alt=""></td>
                    <td><?= $res->name ?></td>

                    <td>
                        <?php foreach (Product::weightAndPrice($res->id) as $weight) : ?>
                            <p><?= $weight->weight ?> Ml</p>
                        <?php endforeach ?>
                    </td>
                    <td>
                        <?php foreach (Product::weightAndPrice($res->id) as $weight) : ?>
                            <p><?= $weight->weightPrice ?> ₽</p>
                        <?php endforeach ?>
                    </td>

                    <td><?= $res->category ?></td>
                    <td>
                        <a href="/app/tables/admin/menu/delete.php?id=<?= $res->id ?>" class="btn btn-danger">X</a>
                        <a href="/app/tables/admin/menu/edit.php?id=<?= $res->id ?>" class="btn btn-warning">✎</a>
                        <a href="/app/tables/admin/menu/description.php?id=<?= $res->id ?>" class="view btn">👁</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

</div>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/footer.php"; ?>