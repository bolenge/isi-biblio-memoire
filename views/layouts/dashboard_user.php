<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/public/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/public/img/favicon.png">
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
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/public/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="white" data-active-color="danger">
            <div class="logo">
                <a href="/dashboard" class="simple-text logo-mini">
                    <div class="logo-image-small">
                        <img src="/public/img/logo-small.png">
                    </div>
                    <!-- <p>CT</p> -->
                </a>
                <a href="/dashboard" class="simple-text logo-normal">
                    <?= config('app.name') ?>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="active ">
                        <a href="/dashboard">
                            <i class="nc-icon nc-bank"></i>
                            <p>Tableau de bord</p>
                        </a>
                    </li>

                    <li>
                        <a href="/my-books">
                            <i class="nc-icon nc-book-bookmark"></i>
                            <p>Mes Livres</p>
                        </a>
                    </li>

                    <li>
                        <a href="/my-library">
                            <i class="nc-icon nc-align-left-2"></i>
                            <p>Ma Bibliothèque</p>
                        </a>
                    </li>

                    <li>
                        <a href="/asubscriptions">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>Mes Abonnements</p>
                        </a>
                    </li>
                    <li>
                        <a href="/notifications">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li>
                        <a href="/profile">
                            <i class="nc-icon nc-single-02"></i>
                            <p>Mon Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="/setting">
                            <i class="fa fa-cog"></i>
                            <p>Paramètres</p>
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
                                <input type="text" value="" class="form-control" placeholder="Search..." style="width: 350px;">
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
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Travaux de fin d'études</a>
                                    <a class="dropdown-item" href="#">Livres</a>
                                    <a class="dropdown-item" href="#">Romans</a>
                                    <a class="dropdown-item" href="#">Poèmes</a>
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
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="nc-icon nc-single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Alex Devs</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/profile"><i class="nc-icon nc-single-02 mr-3"></i> Mon Profile</a>
                                    <a class="dropdown-item" href="#"><i class="nc-icon nc-key-25 mr-3"></i> Changer mot de passe</a>
                                    <a class="dropdown-item" href="#"><i class="nc-icon nc-button-power mr-3"></i> Déconnexion</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
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
                                            <p class="card-title">35<p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-refresh"></i>
                                    Actualiser
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
                                            <p class="card-title">35<p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-refresh"></i>
                                    Actualiser
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
                                            <i class="nc-icon nc-refresh-69 text-success"></i>
                                        </div>
                                    </div>
                                    <div class="col-7 col-md-8">
                                        <div class="numbers">
                                            <p class="card-category">En cours de lecture</p>
                                            <p class="card-title">15<p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-refresh"></i>
                                    Actualiser
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
                                            <p class="card-title">23<p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-refresh"></i>
                                    Actualiser
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
                                            <p class="card-title">1 500<p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                   <i class="fa fa-refresh"></i>
                                   Actualiser
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
                                            <p class="card-title">40<p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer ">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-refresh"></i>
                                    Actualiser
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h5 class="card-title my-5">Découvrez notre nouvelles collections</h5>

                <div class="row">
                    <?php for ($i = 0; $i < 8;$i++ ) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-4">
                            <div class="card ">
                                <div class="card-header ">
                                    <h6 class="card-title">La Semaine de 4 Heures</h6>
                                    <p class="card-category">Philosophie</p>
                                </div>
                                <div class="card-body py-0">
                                    <img src="/public/img/books/semaine-4-heures.jpg" alt="Livre la semaine de 4 heures" />
                                </div>
                                <div class="card-footer ">
                                    <div class="legend text-center">
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star-half-o text-warning"></i>
                                        <i class="fa fa-star-o text-warning"></i>
                                    </div>
                                    <hr>
                                    <div class="stats text-center">
                                        <i class="fa fa-book"></i> eBook | <i class="fa fa-play-circle"></i> Audio
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endfor ?>
                </div>
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
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="/public/js/core/jquery.min.js"></script>
    <script src="/public/js/core/popper.min.js"></script>
    <script src="/public/js/core/bootstrap.min.js"></script>
    <script src="/public/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="/public/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="/public/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/public/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="/public/demo/demo.js"></script>
    <script>
        $(document).ready(function () {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
</body>

</html>
