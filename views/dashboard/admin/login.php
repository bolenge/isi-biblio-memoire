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
    <link rel="stylesheet" href="/public/css/style.css">
</head>

<body>

    <div id="single-wrapper">
        <div class="text-center" style="margin-bottom: -15px;margin-top: 40px;">
            <img src="/public/img/logos/logo-congo-book.png" alt="Logo de CongoBook" width="40px">
            <strong style="font-size: 20px;" class="text-primary"><?= config('app.name') ?></strong>
        </div>
        <form action="#" class="frm-single">
            <div class="inside">
                <div class="title margin-bottom-20"><strong>Connexion Admin</strong></div>
                <!-- /.frm-title -->
                <div class="frm-input">
                    <input type="text" placeholder="Nom d'utilisateur" class="frm-inp" name="username" id="username" required /><i
                        class="fa fa-user frm-ico"></i>
                </div>
                <div class="frm-input">
                    <input type="password" placeholder="Mot de passe" class="frm-inp" name="password" id="password" required />
                    <i class="fa fa-lock frm-ico"></i>
                </div>
                        
                <button type="submit" class="frm-submit btn-primary">Connexion<i class="fa fa-arrow-circle-right"></i></button>

                <div class="clearfix">
                    <div class="text-center"><a href="page-recoverpw.html" class="a-link"><i class="fa fa-unlock-alt"></i>Mot de passe oublié ?</a></div>
                </div>
                
                <div class="frm-footer text-center">Powered <strong class="text-primary">Umoja Technology</strong> &copy; <?= date('Y') ?></div>
                <!-- /.footer -->
            </div>
            <!-- .inside -->
        </form>
        <!-- /.frm-single -->
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
    <script src="/public/admin/plugin/sweet-alert/sweetalert.min.js"></script>
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

    <script src="/public/js/utils/functions.js"></script>
    <script src="/public/js/api/router.js" type="module"></script>
</body>

</html>