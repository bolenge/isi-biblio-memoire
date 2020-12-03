<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Models\UsersModel;
    use Core\Validator;
    use Core\Out;


    $router = new Router;
    $userMiddleware = require('./middlewares/users.php');

    $router->get('/waiting', function (Request $req, Response $res) {
        $res->extends('layouts/dashboard_admin');
        $res->render('dashboard/admin/books/waiting', [
            'title' => "Administration ".config('app.name'),
            'active' => 'books'
        ]);
        
    });
    
    return $router;