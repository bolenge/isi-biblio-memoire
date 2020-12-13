<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Models\UsersModel;
    use Core\Validator;
    use Core\Out;


    $router = new Router;
    $adminMiddleware = require('./middlewares/admins.php');

    /**
     * Route de livres en attente
     */
    $router->get('/waiting', function (Request $req, Response $res) {
        $res->extends('layouts/dashboard_admin');
        $res->render('dashboard/admin/books/waiting', [
            'title' => "Administration ".config('app.name'),
            'active' => 'books'
        ]);
        
    });

    /**
     * Route de livres publiés
     */
    $router->get('/published', function (Request $req, Response $res) {
        $res->extends('layouts/dashboard_admin');
        $res->render('dashboard/admin/books/published', [
            'title' => "Administration ".config('app.name'),
            'active' => 'books'
        ]);
        
    });
    
    return $router;