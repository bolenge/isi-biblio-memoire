<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;


    $router = new Router;
    $userMiddleware = require('./middlewares/users.php');

    $router->get('/', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['auth']($req, $res);

        $res->redirect('/dashboard');
    });

    $router->get('/dashboard', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['auth']($req, $res);

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/dashboard', [
            'title' => 'Tableau de bord',
            'active' => "dashboard"
        ]);
    });
    
    $router->get('/login', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        $res->extends('layouts/signin');
        $res->render('pages/login', [
            'title' => "Connexion"
        ]);
    });

    $router->get('/register', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        $res->extends('layouts/signin');
        $res->render('pages/register', [
            'title' => "Création de compte"
        ]);
    });

    $router->get('/my\-books', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/my_books', [
            'title' => 'Mes livres publiés',
            'active' => 'my-books'
        ]);
    });

    $router->get('/my\-books/create', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/create_book', [
            'title' => 'Mes livres publiés',
            'active' => 'my-books'
        ]);
    });
    
    return $router;