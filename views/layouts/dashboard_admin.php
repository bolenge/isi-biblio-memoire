<!DOCTYPE html>
<html lang="<?= config('app.locale') ?>">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?= !empty($title) ? $title : "Administration ".config('app.name') ?>
    </title>

    <!-- Main Styles -->
    <link rel="stylesheet" href="/public/admin/styles/style.min.css">

    <!-- mCustomScrollbar -->
    <link rel="stylesheet" href="/public/admin/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

    <!-- Waves Effect -->
    <link rel="stylesheet" href="/public/admin/plugin/waves/waves.min.css">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="/public/admin/plugin/sweet-alert/sweetalert.css">

    <!-- Percent Circle -->
    <link rel="stylesheet" href="/public/admin/plugin/percircle/css/percircle.css">

    <!-- Chartist Chart -->
    <link rel="stylesheet" href="/public/admin/plugin/chart/chartist/chartist.min.css">

    <link rel="stylesheet" href="/public/admin/plugin/datatables/media/css/jquery.dataTables.min.css">

    <!-- FullCalendar -->
    <link rel="stylesheet" href="/public/admin/plugin/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="/public/admin/plugin/fullcalendar/fullcalendar.print.css" media='print'>

    <!-- Color Picker -->
    <link rel="stylesheet" href="/public/admin/color-switcher/color-switcher.min.css">
    <link rel="stylesheet" href="/public/node_modules/animate.css/animate.min.css">
    <link rel="stylesheet" href="/public/css/style.css">
    <link href="/public/css/loader.css" rel="stylesheet" />
</head>

<body>
    <div class="main-menu">
        <header class="header">
            <a href="index.html" class="logo text-white">
                <img src="/public/img/logos/logo-congo-book.png" alt="Logo de <?= config('app.name') ?>" width="40">
                <?= config('app.name') ?>
            </a>
            <button type="button" class="button-close fa fa-times js__menu_close"></button>
            <div class="user">
                <a href="#" class="avatar"><img src="/public/img/default-avatar.png" alt=""><span
                        class="status online"></span></a>
                <h5 class="name"><a href="#"><?= session('admin')['firstName'].' '.session('admin')['name'] ?></a></h5>
                <h5 class="position">Administrator</h5>
                <!-- /.name -->
                <div class="control-wrap js__drop_down">
                    <i class="fa fa-caret-down js__drop_down_button"></i>
                    <div class="control-list">
                        <div class="control-item"><a href="/admin/profile"><i class="fa fa-user"></i> Profile</a></div>
                        <div class="control-item"><a href="/admin/reset-password"><i class="fa fa-gear"></i> Changer mot de passe</a></div>
                        <div class="control-item"><a href="/admin/logout" class="btn_logout"><i class="fa fa-sign-out"></i> Déconnexion</a></div>
                    </div>
                    <!-- /.control-list -->
                </div>
                <!-- /.control-wrap -->
            </div>
            <!-- /.user -->
        </header>
        <!-- /.header -->
        <div class="content">

            <div class="navigation">
                <!-- /.title --> 
                <ul class="menu js__accordion">
                    <li class="<?= get_active_menu('dashboard', $active, 'current') ?>">
                        <a class="waves-effect" href="/admin/dashboard"><i class="menu-icon fa fa-home"></i><span>Dashboard</span></a>
                    </li>

                    <li class="<?= get_active_menu('categories', $active, 'current') ?>">

                        <a class="waves-effect parent-item js__control" href="#"><i
                                class="menu-icon fa fa-th-large"></i><span>Domaines & Catégories</span><span
                                class="menu-arrow fa fa-angle-down"></span></a>
                        <ul class="sub-menu js__content">
                            <li><a href="/admin/types"><i class="fa fa-bars"></i>&nbsp;&nbsp;Domaines</a>
                            </li>
                            <li><a href="/admin/categories"><i class="fa fa-th-large"></i>&nbsp;&nbsp;Catégories</a></li>
                        </ul>
                    </li>


                    <li class="<?= get_active_menu('books', $active, 'current') ?>">
                        
                        <a class="waves-effect parent-item js__control" href="#"><i
                                class="menu-icon fa fa-book"></i><span>Livres</span><span
                                class="menu-arrow fa fa-angle-down"></span></a>
                        <ul class="sub-menu js__content">
                            <li><a href="/admin/books/create"><i class="fa fa-send"></i>&nbsp;&nbsp;Publier</a></li>
                            <li><a href="/admin/books/published"><i class="fa fa-list"></i>&nbsp;&nbsp;Tous les livres</a></li>
                        </ul>
                    </li>

                    <li class="<?= get_active_menu('abonnes', $active, 'current') ?>">
                        <a class="waves-effect" href="/admin/abonnes"><i
                                class="menu-icon fa fa-users"></i><span>Abonnés</span></a>
                    </li>

                    <li class="<?= get_active_menu('subscriptions', $active, 'current') ?>">
                        <a class="waves-effect" href="/admin/subscriptions"><i
                                class="menu-icon fa fa-money"></i><span>Abonnement</span></a>
                    </li>

                    <li>
                        <a class="waves-effect parent-item js__control" href="#"><i
                                class="menu-icon fa fa-cogs"></i><span>Configurations</span><span
                                class="menu-arrow fa fa-angle-down"></span></a>
                        <ul class="sub-menu js__content">
                            <li><a href="ui-buttons.html">Abonnement</a></li>
                            <li><a href="ui-cards.html">Admins</a></li>
                        </ul>
                        <!-- /.sub-menu js__content -->
                    </li>
                </ul>
            </div>
            <!-- /.navigation -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.main-menu -->

    <div class="fixed-navbar">
        <div class="pull-left">
            <button type="button"
                class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
            <h1 class="page-title">Home</h1>
            <!-- /.page-title -->
        </div>
        <!-- /.pull-left -->
        <div class="pull-right">
            <!-- /.ico-item  pulse : Pour l'effet -->
            <a href="#" class="ico-item "><span class="ico-item fa fa-bell notice-alarm js__toggle_open"
                    data-target="#notification-popup"></span></a>   
            <a href="#" class="ico-item fa fa-power-off btn_logout"></a>
        </div>
        <!-- /.pull-right -->
    </div>
    <!-- /.fixed-navbar -->

    <div id="notification-popup" class="notice-popup js__toggle" data-space="75">
        <h2 class="popup-title">Your Notifications</h2>
        <!-- /.popup-title -->
        <div class="content">
            <ul class="notice-list">
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">John Doe</span>
                        <span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
                        <span class="time">10 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">Anna William</span>
                        <span class="desc">Like your post: “Facebook Messenger”</span>
                        <span class="time">15 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar bg-warning"><i class="fa fa-warning"></i></span>
                        <span class="name">Update Status</span>
                        <span class="desc">Failed to get available update data. To ensure the please contact us.</span>
                        <span class="time">30 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
                        <span class="name">Jennifer</span>
                        <span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
                        <span class="time">45 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">Michael Zenaty</span>
                        <span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
                        <span class="time">50 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">Simon</span>
                        <span class="desc">Like your post: “Facebook Messenger”</span>
                        <span class="time">1 hour</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar bg-violet"><i class="fa fa-flag"></i></span>
                        <span class="name">Account Contact Change</span>
                        <span class="desc">A contact detail associated with your account has been changed.</span>
                        <span class="time">2 hours</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">Helen 987</span>
                        <span class="desc">Like your post: “Facebook Messenger”</span>
                        <span class="time">Yesterday</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/128x128" alt=""></span>
                        <span class="name">Denise Jenny</span>
                        <span class="desc">Like your post: “Contact Form 7 Multi-Step”</span>
                        <span class="time">Oct, 28</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">Thomas William</span>
                        <span class="desc">Like your post: “Facebook Messenger”</span>
                        <span class="time">Oct, 27</span>
                    </a>
                </li>
            </ul>
            <!-- /.notice-list -->
            <a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
        </div>
        <!-- /.content -->
    </div>
    <!-- /#notification-popup -->

    <div id="message-popup" class="notice-popup js__toggle" data-space="75">
        <h2 class="popup-title">Recent Messages<a href="#" class="pull-right text-danger">New message</a></h2>
        <!-- /.popup-title -->
        <div class="content">
            <ul class="notice-list">
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">John Doe</span>
                        <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere
                            repellat voluptates.</span>
                        <span class="time">10 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">Harry Halen</span>
                        <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere
                            repellat voluptates.</span>
                        <span class="time">15 min</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="avatar"><img src="http://placehold.it/80x80" alt=""></span>
                        <span class="name">Thomas Taylor</span>
                        <span class="desc">Amet odio neque nobis consequuntur consequatur a quae, impedit facere
                            repellat voluptates.</span>
                        <span class="time">30 min</span>
                    </a>
                </li>
            </ul>
            <!-- /.notice-list -->
            <a href="#" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
        </div>
        <!-- /.content -->
    </div>
    

    <div id="wrapper">
        <div class="main-content">

            <!-- Content -->
            <?= $content ?>
            <!-- End content -->
            
            <!-- /.row -->
            <footer class="footer">
                <ul class="list-inline">
                    <li>&copy; <?= date('Y').' '.config('app.name') ?> </li>

                    <li class=" pull-right">Powred by <a href="#"><strong>ISI-Biblio</strong></a></li>
                </ul>
            </footer>
        </div>
        <!-- /.main-content -->
    </div>
    <!--/#wrapper -->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
            <script src="/public/admin/script/html5shiv.min.js"></script>
            <script src="/public/admin/script/respond.min.js"></script>
        <![endif]-->
    <!-- 
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/public/admin/scripts/jquery.min.js"></script>
    <script src="/public/admin/scripts/modernizr.min.js"></script>
    <script src="/public/admin/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="/public/admin/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="/public/admin/plugin/nprogress/nprogress.js"></script>
    <script src="/public/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script src="/public/admin/plugin/waves/waves.min.js"></script>
    <!-- Full Screen Plugin -->
    <script src="/public/admin/plugin/fullscreen/jquery.fullscreen-min.js"></script>

    <!-- Percent Circle -->
    <script src="/public/admin/plugin/percircle/js/percircle.js"></script>

    <!-- Google Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Chartist Chart -->
    <script src="/public/admin/plugin/chart/chartist/chartist.min.js"></script>
    <script src="/public/admin/scripts/chart.chartist.init.min.js"></script>

    <!-- FullCalendar -->
    <script src="/public/admin/plugin/moment/moment.js"></script>
    <script src="/public/admin/plugin/fullcalendar/fullcalendar.min.js"></script>
    <script src="/public/admin/scripts/fullcalendar.init.js"></script>

    <!-- Data Tables -->
    <script src="/public/admin/plugin/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/public/admin/plugin/datatables/media/js/dataTables.bootstrap.min.js"></script>
    <script src="/public/admin/plugin/editable-table/mindmup-editabletable.js"></script>
    <script src="/public/admin/scripts/datatables.demo.min.js"></script>

    <script src="/public/admin/scripts/main.min.js"></script>
    <script src="/public/admin/color-switcher/color-switcher.min.js"></script>
    
    <script src="/public/vendor/ckeditor/ckeditor.js"></script>
    <script src="/public/vendor/ckeditor/samples/js/sample.js"></script>
    
    <script src="/public/js/utils/functions.js"></script>
    <script src="/public/js/api/router.js" type="module"></script>
</body>

</html>