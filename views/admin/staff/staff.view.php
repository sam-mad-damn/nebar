<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/header.php"; ?>

<div class="container">
    <div class="row justify-content-end text-center mt-5 navv">
    <form action="/app/tables/admin/staff/staff.php">
                <button class="btn sort" name="all">ВСЕ</button>
                <button class="btn sort" name="barmen">БАРМЕН</button>
                <button class="btn sort" name="shef">ПОВАР</button>
            </form>
    <a href="/app/tables/admin/staff/insert.php" class="btn btn-success col-1">Добавить</a>
    </div>
    <div class="row justify-content-center text-center">
        <table class="table col-8 g-5">
            <tr class="shapka">
                <th>Изображение</th>
                <th>Имя</th>
                <th>Должность</th>
                <th> </th>
            </tr>
            <?php foreach ($staff as $res) : ?>
                <tr>
                    <td><img src="/upload/<?= $res->image ?>" width="100" height="100" alt="" style="border-radius: 10px; object-fit:cover; "></td>
                    <td><?= $res->name ?></td>
                    <td><?= $res->role ?></td>
                    <td>
                        <a href="/app/tables/admin/staff/edit.php?id=<?= $res->id ?>">✏️</a>
                        <a href="/app/tables/admin/staff/delete.php?id=<?= $res->id ?>" class="btn btn-danger">X</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

</div>


<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/footer.php"; ?>