<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/header.php"; ?>

<div class="container">
    <div class="row justify-content-end text-center mt-5">
        <div class="col-8">
            <a href="/app/tables/admin/table/insert.php" class="btn btn-success">Добавить</a>
        </div>
    </div>
    <div class="row justify-content-center text-center panel panel-default">
        <table class="table col-8 g-2">
            <tr class="shapka">
                <th>Изображение</th>
                <th>№ стола</th>
                <th>Кол-во мест</th>
                <th> </th>
            </tr>
            <?php foreach ($tables as $res) : ?>
                <tr>
                    <td><img src="/upload/<?= $res->image ?>" width="80" height="70" alt="" style="background-color: #6fa9dc; padding: 10px; border-radius: 10px;"></td>
                    <td><?= $res->number ?></td>
                    <td><?= $res->count_seats ?> чел.</td>
                    <td>
                        <a href="/app/tables/admin/table/delete.php?id=<?= $res->id ?>" class="btn btn-danger">X</a>
                        <a href="/app/tables/admin/table/edit.php?id=<?= $res->id ?>" class="btn btn-warning">✎</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

</div>


<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/footer.php"; ?>