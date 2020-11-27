<?php
    require __DIR__.'/vendor/autoload.php';

    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Bin\Application;

    $app = new Application;

    // routers
    $pages = require('./routes/pages.php');

    // Router Api
    $usersApiRouter = require('./routes/api/users.php');
    $typesApiRouter = require('./routes/api/types.php');

    // set configuration of file folders
    $app->set('views', 'views');
    $app->set('public', 'public');

    // Middlwares
    $app->use(function ($req, $res) {
        
    });

    // Routing
    $app->use('/', $pages);
    
    // Routing APi
    $app->use('/api/users', $usersApiRouter);
    $app->use('/api/types', $typesApiRouter);

    // error handler
    $app->trackErrors(function ($error, $req, $res) {
        if ($error->status == 404) {
            $res->render('errors/404');
        }else {
            $res->render('errors/500');
        }
    });