<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;


    $router = new Router;

    $router->get('/', function (Request $req, Response $res) {
        $res->redirect('/dashboard');
    });

    $router->get('/dashboard', function (Request $req, Response $res) {
        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/dashboard', [
            'title' => 'Tableau de bord'
        ]);
    });

    return $router;