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
    <link href="/public/css/style.css" rel="stylesheet" />
    <link href="/public/css/loader.css" rel="stylesheet" />
    <link href="/public/vendor/snackbar/css/snackbar.min.css" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        
        <?= $content ?>

    </div>
    <!--   Core JS Files   -->
    <script src="/public/js/core/jquery.min.js"></script>
    <script src="/public/js/core/popper.min.js"></script>
    <script src="/public/js/core/bootstrap.min.js"></script>
    <script src="/public/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="/public/js/plugins/bootstrap-notify.js"></script>
    <script src="/public/vendor/snackbar/js/snackbar.min.js"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="/public/js/utils/functions.js"></script>
    <script src="/public/js/api/router.js" type="module"></script>
    <script>
        
    </script>
</body>

</html>
