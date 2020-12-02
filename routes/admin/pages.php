<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Models\UsersModel;
    use Core\Validator;
    use Core\Out;


    $router = new Router;
    $userMiddleware = require('./middlewares/users.php');
    
    $router->get('/', function (Request $req, Response $res) {
        $res->redirect('/admin/dashboard');
    });

    $router->get('/dashboard', function (Request $req, Response $res) {
        $res->extends('layouts/dashboard_admin');
        $res->render('dashboard/admin/home', [
            'title' => "Administration ".config('app.name')
        ]);
        
    });
    
    return $router;