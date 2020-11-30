<div class="content">
    <div class="row">
        <!-- Mes Livres -->
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-book-bookmark text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Mes Livres</p>
                                <p class="card-title">
                                    <?= $count_user_books ?>
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="#">
                            <i class="fa fa-eye"></i>
                            Voir
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Livres lus -->
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-glasses-2 text-warning"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Livres lus</p>
                                <p class="card-title">0<p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="#">
                            <i class="fa fa-eye"></i>
                            Voir
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- En cours de lecture -->
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-eye-69 text-success"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">En cours de lecture</p>
                                <p class="card-title">0<p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="#">
                            <i class="fa fa-eye"></i>
                            Voir
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nouveautés -->
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-sun-fog-29 text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Nouveautés</p>
                                <p class="card-title">2<p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="#">
                            <i class="fa fa-eye"></i>
                            Voir
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Les Plus Populaires -->
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-book-bookmark text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Les plus Populaires</p>
                                <p class="card-title">0<p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="#">
                            <i class="fa fa-eye"></i>
                            Voir
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Les Plus Populaires -->
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-bullet-list-67 text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Nos Catégories</p>
                                <p class="card-title" id="count-category"><i class="fa fa-spinner fa-pulse"></i><p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <a href="#">
                            <i class="fa fa-eye"></i>
                            Voir
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($new_books)) : ?>
        <h5 class="card-title my-5">Découvrez notre nouvelle collection</h5>

        <div class="row">
            <!-- new_products -->
                <?php foreach ($new_books as $book) : ?>
                    <div class="col-xl-3 col-lg-4 col-md-4">
                        <div class="card">
                            <div class="card-body text-center p-2 pb-0">
                                <a href="/books/<?= $book->id ?>">
                                    <img src="/<?= !empty($book->cover) ? $book->cover : "public/img/books/default-book-cover.png" ?>" alt="Image de <?= $book->title ?>" class="img-book" />
                                </a>

                                <div class="description pt-3">
                                    <h6 class="title-book"><?= sub_string($book->title, 35) ?></h6>
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
                                    <a href="/books/<?= $book->id ?>"><i class="fa fa-book"></i> eBook</a><?= $book->fileAudio ? ' | <a href="/'.$book->fileAudio.'"><i class="fa fa-play-circle"></i> Audio</a>' : "" ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
        </div>
    <?php endif ?>
</div>