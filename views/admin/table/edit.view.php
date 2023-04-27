<?php

include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/header.php"; ?>

<div class="container justify-content-center">
    <div class="row justify-content-center text-center mt-5">
        <a href="/app/tables/admin/table/table.php" class=" btn col-2">← Обратно</a>
    </div>
    <div class="row justify-content-center p-5">
        <form action="/app/tables/admin/table/updt.php" enctype="multipart/form-data" method="POST" class="card col-8 text-center justify-content-center formCard" style="width: 20rem;">
            <img src="/upload/<?= $table->image??"nophoto.jpg"?>" id="loadedImg" width="100" height="100" class="imgTable mt-3" alt="...">
            <div class="card-body">
                <p class="error"><?=$_SESSION["error"]?? ""?></p>
            <label for="image" class="mt-3">Выберите фото</label>
                <input type="file" name="image" id="file" class="form-control">
                <label for="number" class="mt-3">Укажите № стола</label>
                <input type="number" class="form-control" name="number" value="<?= $table->number?>"></input>
                <label for="count" class="mt-3">Укажите кол-во мест</label>
                <input type="hidden" name="id" value="<?= $table->id?>">
                <input type="number" name="count" class="form-control " value="<?= $table->count_seats ?>"></input>
                <button name="saveBtn" class="btn btn-success mt-3 mb-2">
                    СОХРАНИТЬ
                </button>
            </div>
        </а>
    </div>
</div>
<script src="/assets/js/loadImg.js" defer></script>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templatesAdmin/footer.php"; ?>