<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php"; ?>

<div class="container staffCont">

    <div class="row mt-5 mb-3 btnStaff">
        <a href="/app/tables/client/staff/staff.php?role=бармен" class="btn col-3 barmen" name="barmen">БАРМЕНЫ <img src="/upload/barmen.png" width="50" height="50" alt="barmen"></a>
        <a href="/app/tables/client/staff/staff.php?role=повар" class=" btn col-3 shef" name="shef">ПОВАРА <img src="/upload/shef.png" width="50" height="50" alt="shef"></a>
    </div>

    <div class="row mt-3 mb3">
        <?php foreach ($staff as $person) : ?>
            <section class="lights mt-3 mb-3 col-12">
                <div class="">

                    <article class="postcard lights blue">
                        <a class="postcard__img_link" href="#">
                            <img class="postcard__img" src="/upload/<?= $person->image ?>" alt="Image Title" />
                        </a>
                        <div class="postcard__text">
                            <h1 class="postcard__title blue"><a href="#"><?= $person->name ?></a></h1>
                            <div class="postcard__subtitle small">
                                    <i class="fas mr-2"></i><?= $person->role ?>
                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt"><?= $person->description ?></div>
                        </div>
                    </article>
                </div>
            </section>
        <?php endforeach ?>
    </div>
</div>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php"; ?>