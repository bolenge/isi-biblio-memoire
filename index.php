<?php
    require __DIR__.'/vendor/autoload.php';

    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Bin\Application;

    $app = new Application;

    // routers
    $pages = require('./routes/pages.php');

    // set configuration of file folders
    $app->set('views', 'views');
    $app->set('public', 'public');

    // Middlwares
    $app->use(function ($req, $res) {
        
    });

    $app->use('/', $pages);

    // routing
    

    // error handler
    $app->trackErrors(function ($error, $req, $res) {
        if ($error->status == 404) {
            $res->render('errors/404');
        }else {
            $res->render('errors/500');
        }
    });