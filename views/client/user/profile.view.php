<?php

use App\models\Product;

if (!isset($_SESSION["auth"]) || !$_SESSION["auth"]) {
    header("Location: /app/tables/users/create.php");
    die();
}

include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<div class="container profileCont text-center">
    <div class=" row profileInfo g-4 mt-4 mb-4">
        <div class="col-xl-12 col-md-8 col-sm-12 info">
            <h5 class=""><?= $user->name ?></h5>
            <h5 class=""><?= $user->email ?></h5>
            <h5 class=""><?= $user->phone ?></h5>
            <form action="/app/tables/client/user/update.php" class="updtProf" style="min-width: 50px">
                <button class="button btn" name="changeBtn">ИЗМЕНИТЬ</button>
            </form>
        </div>
    </div>
    <div class="row btnFilter text-center">
        <a href="/app/tables/client/user/profile.php" class="btn col-md-2 col-sm-12">Все</a>
        <a href="/app/tables/client/user/profile.php?res=1" class="btn col-md-5 col-sm-12">Прошедшие</a>
        <a href="/app/tables/client/user/profile.php?res=2" class="btn col-md-5 col-sm-12">Наступающие</a>
    </div>

    <h4 class="mt-3 mb-3">История бронирования</h4>
    <table class="del table">
        <tr class="shapka">
            <th>стол №</th>
            <th>дата</th>
            <th>время</th>
            <th>продолжительность</th>
            <th>Кол-во блюд</th>
            <th>Стоимость блюд</th>
            <th> </th>
        </tr>
        <?php foreach ($reserv as $res) : ?>
            <tr>
                <td aria-label="стол № "><?= $res->number ?></td>
                <td aria-label="дата: "><?= date_create($res->date )->Format('d.m.Y') ?></td>
                <td aria-label="время: "><?= $res->time ?></td>
                <td aria-label="продолжительность: "><?= $res->duration ?> ч.</td>
                <td aria-label="Кол-во блюд: "><?= Product::totalCount($res->id_reserv) ?? 0 ?> шт.</td>
                <td aria-label="Стоимость блюд: "><?= Product::totalPrice($res->id_reserv) ?? 0 ?> ₽</td>
                <td aria-label="Просмотр: "><a href="/app/tables/client/order/order.php?id=<?= $res->id_reserv ?>">👁️</a></td>
            </tr>
        <?php endforeach ?>
    </table>

</div>



<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php'; ?>