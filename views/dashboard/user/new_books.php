<div class="content">
    <h5 class="card-title my-5">Découvrez notre nouvelle collection</h5>

    <?php if (!empty($books)) : ?>

        <div class="row">
            <!-- new_products -->
            <?php foreach ($books as $book) : ?>
                <div class="col-xl-3 col-lg-4 col-md-4">
                    <div class="card">
                        <div class="card-body text-center p-2 pb-0">
                            <a href="/books/<?= $book->id ?>">
                                <img src="/<?= !empty($book->cover) ? $book->cover : "public/img/books/default-book-cover.png" ?>" alt="Image de <?= $book->title ?>" class="img-book" />
                            </a>

                            <div class="description pt-3">
                                <h6 class="title-book"><?= sub_string($book->title, 29) ?></h6>
                                <p class="pb-0 mb-0"><?= sub_string($book->other, 35) ?></p>
                            </div>
                        </div>
                        <div class="card-footer p-2">
                            <div class="legend text-center">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star-half-o text-warning"></i>
                                <i class="fa fa-star-o text-warning"></i>
                            </div>
                            <hr>
                            <div class="stats text-center">
                                <a href="/books/<?= $book->id ?>"><i class="fa fa-book"></i>
                                    eBook</a><?= $book->fileAudio ? ' | <a href="/'.$book->fileAudio.'"><i class="fa fa-play-circle"></i> Audio</a>' : "" ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</div>