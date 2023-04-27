<?php

use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/header.php"; ?>


<div class="container justify-content-center">
    <div class="row justify-content-center mt-5">
        <nav class="nav flex-column navvvv col-5">
            <form action="/app/tables/admin/book/book.php">
                <button class="btn sort" name="all">ВСЕ</button>
                <button class="btn sort" name="waiting">В ОЖИДАНИИ</button>
                <button class="btn sort" name="confirmed">ПОДТВЕРЖДЕН</button>
                <button class="btn sort" name="cancelled">ОТМЕНЕН</button>
            </form>
        </nav>
        <div class="col-1">

        </div>
        <form class="col-4" action="/app/tables/admin/book/book.php">
            <button class="btn btn-danger" name="delete">УДАЛИТЬ СТАРЫЕ ЗАПИСИ</button>
        </form>
    </div>
    <div class="row justify-content-center mt-2">
        <div class="col-10 justify-content-center">
            <p>✔️ - <?= $confirmed?> записи</p>
            <p>❌ - <?= $cancelled?> записи</p>
            <p>🔄 - <?= $waiting?> записи</p>
        </div>
    </div>

    <div class="row justify-content-center mt-2">
        <table class=" table col-12 conteiner-orders">
            <tr class="shapka">
                <th class="">id</th>
                <th scope="col">Пользователь</th>
                <th scope="col">№ стола</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата</th>
                <th scope="col">Время</th>
                <th scope="col">продолж-сть</th>
                <th scope="col">Дата создания</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col">Стоимость</th>
                <th scope="col">Кол-во</th>
                <th scope="col">Действия</th>

            </tr>
            <?php foreach ($orders as $order) : ?>
                <tr class="orders-position <?= $order->status == "Подтвержден" ? "table-success" : "" ?>
                <?= $order->status == "Отменен" ? "table-danger" : "" ?>
                ">
                    <td><?= $order->id ?></td>
                    <td><?= $order->phone ?></td>
                    <td><?= $order->number ?></td>
                    <td class="status">
                        <form action="/app/tables/admin/book/status.php" method="post">
                            <input type="hidden" name="id" value="<?= $order->id ?>">
                            <?php if ($order->status == "В ожидании") : ?>
                                <select name="status" onchange="this.form.submit()" class="form-control" id="">
                                    <option <?= $order->status == "В ожидании" ? "selected" : "" ?> value="В ожидании">В ожидании</option>
                                    <option <?= $order->status == "Подтвержден" ? "selected class='table-success'" : "" ?> value="Подтвержден">Подтвержден</option>
                                    <option <?= $order->status == "Отменен" ? "selected" : "" ?> value="Отменен">Отменен</option>
                                </select>
                            <?php else : ?>
                                <?= $order->status ?>
                            <?php endif ?>
                        </form>
                    <td><?= date_create($order->date)->Format('d.m.Y') ?></td>
                    <td><?= date_create($order->time)->Format('H:i') ?></td>
                    <td><?= $order->duration ?> Ч.</td>
                    <td colspan="3"><?= date_create($order->created_at)->Format('d.m.y H:i') ?></td>
                    <td><?= Product::totalPrice($order->id) . "₽" ?? "0" ?></td>
                    <td><?= Product::totalCount($order->id) . "шт." ?? "0" ?></td>
                    <td class="doing">
                        <a href="/app/tables/admin/book/all.product.php?id=<?= $order->id ?>" class="view btn" name="view">👁</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<script>
    document.querySelector(".delete").addEventListener("click", () => {
        location.reload();
    })
</script>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/footer.php"; ?>