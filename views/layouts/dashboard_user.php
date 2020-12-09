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
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="/dashboard" class="simple-text logo-mini">
                    <div class="logo-image-small">
                        <img src="/public/img/logos/logo-congo-book.png" alt="Logo de <?= config('app.name') ?>">
                    </div>
                    <!-- <p>CT</p> -->
                </a>
                <a href="/dashboard" class="simple-text logo-normal">
                    <?= config('app.name') ?>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="<?= get_active_menu("dashboard", $active) ?>">
                        <a href="/dashboard">
                            <i class="nc-icon nc-bank"></i>
                            <p>Tableau de bord</p>
                        </a>
                    </li>

                    <li class="<?= get_active_menu("my-books", $active) ?>">
                        <a href="/my-books">
                            <i class="nc-icon nc-book-bookmark"></i>
                            <p>Mes Livres</p>
                        </a>
                    </li>

                    <li class="<?= get_active_menu("my-library", $active) ?>">
                        <a href="/my-library">
                            <i class="nc-icon nc-bookmark-2"></i>
                            <p>Ma Bibliothèque</p>
                        </a>
                    </li>

                    <li class="<?= get_active_menu("my-reader", $active) ?>">
                        <a href="/my-reader">
                            <i class="nc-icon nc-align-left-2"></i>
                            <p>Mes lectures</p>
                        </a>
                    </li>

                    <li class="<?= get_active_menu("subscriptions", $active) ?>">
                        <a href="/subscriptions">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>Mes Abonnements</p>
                        </a>
                    </li>
                    <li class="<?= get_active_menu("notifications", $active) ?>">
                        <a href="/notifications">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li class="<?= get_active_menu("profile", $active) ?>">
                        <a href="/profile">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Mon Profile</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:;"><?= !empty($title) ? $title : "" ?></a>
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
                                <input type="text" value="" class="form-control" placeholder="Recherche..." style="width: 350px;" id="input-search">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="nc-icon nc-zoom-split"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="/categories"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="nc-icon nc-bullet-list-67"></i>
                                    <p>
                                        <span>Catégories</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink" id="menu-list-categories">
                                    
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
                                <a class="nav-link dropdown-toggle" href="#"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <img src="/public/img/default-avatar.png" alt="Default avatar" class="avatar" style="width: 25px;height: 25px;border-radius: 50%;">
                                    <p>
                                        <span style="text-transform: none !important;"><?= session('user')['name'] ?></span>

                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/profile"><i class="nc-icon nc-single-02 mr-3"></i> Mon Profile</a>
                                    <a class="dropdown-item" href="/reset-password"><i class="nc-icon nc-key-25 mr-3"></i> Changer mot de passe</a>
                                    <a class="dropdown-item logout-user" href="/logout"><i class="nc-icon nc-button-power mr-3"></i> Déconnexion</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <?= $content ?>
            
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
        </div>
    </div>

    <div id="block-search">
        <button class="btn btn-primary float-right" id="btn-close-search"><i class="fa fa-times"></i></button>
        <div>
            <h3 id="search-title">Tapez votre recherche...</h3>
            
            <div class="row" id="content-search">
                
            </div>
        </div>
    </div>

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
