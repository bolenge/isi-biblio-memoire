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

    $router->get('/my\-library', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/my_library', [
            'title' => 'Ma bibliothèque',
            'active' => 'my-library'
        ]);
    });

    $router->get('/my\-library/:id', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/read_book', [
            'title' => 'Lecture du livre',
            'active' => 'my-library'
        ]);
    });

    $router->get('/subscriptions', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/subscriptions', [
            'title' => 'Mes Abonnements',
            'active' => 'subscriptions'
        ]);
    });

    $router->get('/notifications', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/notifications', [
            'title' => 'Mes Abonnements',
            'active' => 'notifications'
        ]);
    });

    $router->get('/profile', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/profile', [
            'title' => "Profile",
            'active' => 'profile'
        ]);
    });
    
    return $router;