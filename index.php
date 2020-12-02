<?php
    require __DIR__.'/vendor/autoload.php';

    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Bin\Application;

    $app = new Application;

    // routers
    $pages = require('./routes/pages.php');
    $users = require('./routes/users.php');

    // Routers admin
    $pagesAdminRouter = require('./routes/admin/pages.php');

    // Router Api
    $usersApiRouter = require('./routes/api/users.php');
    $typesApiRouter = require('./routes/api/types.php');
    $categoriesApiRouter = require('./routes/api/categories.php');
    $mediasApiRouter = require('./routes/api/medias.php');
    $booksApiRouter = require('./routes/api/books.php');
    $adminsApiRouter = require('./routes/api/admins.php');

    // set configuration of file folders
    $app->set('views', 'views');
    $app->set('public', 'public');

    // Middlwares
    $app->use(function ($req, $res) {
        
    });

    // Routing
    $app->use('/', $pages);
    $app->use('/users', $users);

    // Routing admin
    $app->use('/admin', $pagesAdminRouter);
    
    // Routing APi
    $app->use('/api/users', $usersApiRouter);
    $app->use('/api/types', $typesApiRouter);
    $app->use('/api/categories', $categoriesApiRouter);
    $app->use('/api/medias', $mediasApiRouter);
    $app->use('/api/books', $booksApiRouter);
    $app->use('/api/admins', $adminsApiRouter);

    // error handler
    $app->trackErrors(function ($error, $req, $res) {
        if ($error->status == 404) {
            $res->render('errors/404');
        }else {
            $res->render('errors/500');
        }
    });