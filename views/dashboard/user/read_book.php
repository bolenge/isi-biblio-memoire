<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="/public/img/logos/logo-congo-book.png">
        <link rel="icon" type="image/png" href="/public/img/logos/logo-congo-book.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>
            <?=
                !empty($title) ? $title : config('app.name')
            ?>
        </title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
            name='viewport' />
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <!-- CSS Files -->
        <link href="/public/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/public/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
        <link rel="stylesheet" href="/public/node_modules/swiper/swiper-bundle.min.css">
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="/public/demo/demo.css" rel="stylesheet" />
        <link href="/public/css/style.css" rel="stylesheet" />
        <link href="/public/css/loader.css" rel="stylesheet" />
    </head>

    <body class="">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent" style="margin-bottom: 50px;">
            <div class="container-fluid">
                <div class="navbar-wrapper">
                    <div class="navbar-toggle">
                        <button type="button" class="navbar-toggler">
                            <span class="navbar-toggler-bar bar1"></span>
                            <span class="navbar-toggler-bar bar2"></span>
                            <span class="navbar-toggler-bar bar3"></span>
                        </button>
                    </div>
                    <a class="navbar-brand" href="/dashboard">
                        <div class="logo-image-small">
                            <img src="/public/img/logos/logo-congo-book.png" alt="Logo de <?= config('app.name') ?>" style="width: 30px;" /> <?= config('app.name') ?>
                        </div>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                    aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                    <span class="navbar-toggler-bar navbar-kebab"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <form>
                        <div class="input-group no-border">
                            <input type="text" value="" class="form-control" placeholder="Recherche..."
                                style="width: 350px;">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="nc-icon nc-zoom-split"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" href="/categories" id="navbarDropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="nc-icon nc-bullet-list-67"></i>
                                <p>
                                    <span>Catégories</span>
                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink"
                                id="menu-list-categories">

                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link btn-magnify" href="javascript:;">
                                <i class="nc-icon nc-bell-55"></i>
                                <p>
                                    <span class="d-lg-none d-md-block">Notifications</span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item btn-rotate dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="/public/img/default-avatar.png" alt="Default avatar" class="avatar"
                                    style="width: 25px;height: 25px;border-radius: 50%;">
                                <p>
                                    <span style="text-transform: none !important;"><?= session('user')['name'] ?></span>

                                </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="/profile"><i class="nc-icon nc-single-02 mr-3"></i> Mon
                                    Profile</a>
                                <a class="dropdown-item" href="/reset-password"><i class="nc-icon nc-key-25 mr-3"></i>
                                    Changer mot de passe</a>
                                <a class="dropdown-item logout-user" href="/logout"><i
                                        class="nc-icon nc-button-power mr-3"></i> Déconnexion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <div class="content content-read-book mt-5 pt-3">
            <?php if (!empty($book)) : ?>
                <div class="card-header bg-primary px-10">
                    <img src="/<?= !empty($book->cover) ? $book->cover : 'public/img/books/semaine-4-heures.jpg' ?>"
                        alt=""
                        class="float-left w-100px mr-5" />
                    <h2 class="card-title font-weight-bold"><?= $book->title ?></h2>
                    <p class="card-card-description">
                        Catégorie : <?= !empty($book->category) ? $book->category->intituled : "" ?> <br>
                        Par : <?= $book->other ?>
                    </p>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-lg-9">
                                    <div class="card shadow-none mt-3">
                                        <div class="card-body" style="">

                                            <div class="mb-5 text-center">
                                                <?php if (!empty($book->cover)) : ?>
                                                    <img src="/<?= $book->cover ?>" alt="" width="450px" height="550px">
                                                <?php endif ?>

                                                <div>
                                                    <button type="button" class="btn btn-primary mt-5" id="btn-begin-reading" data-book="<?= $book->id ?>">Commencer la lecture</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="card mt-5">
                                        <div class="card-header bg-primary">
                                            <h6 class="card-title text-center">CHAPITRES</h6>
                                        </div>
                                        <div class="card-body">
                                            <?php if (!empty($chapters)) : ?>
                                                <ul>
                                                    <?php foreach ($chapters as $chapter) : ?>
                                                        <li><a href="/books/<?= $book->id.'/chapters/'. $chapter->id ?>"><?= $chapter->title ?></a></li>
                                                    <?php endforeach ?>
                                                </ul>
                                            <?php else : ?>
                                                <p class="text-center">Ce livre n'a aucun chapitre</p>
                                            <?php endif ?>

                                            <div class="text-center">
                                                <a href="#" class="btn btn-primary-light btn-sm"><i class="fa fa-download"></i> Télécharger le pdf</a>
                                                <a href="/my-library" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Tableau de bord</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>

        <footer class="footer footer-black  footer-white ">
            <div class="container-fluid">
                <div class="row">
                    <nav class="footer-nav">
                        <ul>
                            <li><a href="#">© <?= date('Y') ?> - <?= config('app.name') ?></a></li>
                        </ul>
                    </nav>
                    <div class="credits ml-auto">
                        <span class="copyright">
                            Powered by <a href="#">Ümoja Foundation</a>
                        </span>
                    </div>
                </div>
            </div>
        </footer>
        <!--   Core JS Files   -->
        <script src="/public/js/core/jquery.min.js"></script>
        <script src="/public/js/core/popper.min.js"></script>
        <script src="/public/js/core/bootstrap.min.js"></script>
        <script src="/public/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
        <!-- Chart JS -->
        <script src="/public/js/plugins/chartjs.min.js"></script>
        <script src="/public/node_modules/swiper/swiper-bundle.min.js"></script>
        <script src="/public/node_modules/sweetalert/dist/sweetalert.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="/public/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="/public/js/paper-dashboard.js" type="text/javascript"></script>
        <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
        <script src="/public/demo/demo.js"></script>
        <script src="/public/js/utils/functions.js"></script>
        <script src="/public/js/api/router.js" type="module"></script>
        <script>
            // $(document).ready(function () {
            //     // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            //     demo.initChartsPages();
            // });

            // var swiper = new Swiper('.swiper-container', {
            //     slidesPerView: 6,
            //     direction: getDirection(),
            //     navigation: {
            //         nextEl: '.swiper-button-next',
            //         prevEl: '.swiper-button-prev',
            //     },

            // });

            //     function getDirection() {
            //         var windowWidth = window.innerWidth;
            //         var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';

            //         return direction;
            //     }
        </script>
    </body>
</html>