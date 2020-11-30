<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Models\UsersModel;
    use Models\BooksModel;
    use Core\Model;

    $model = new Model;
    $router = new Router;
    $userMiddleware = require('./middlewares/users.php');
    $booksModel = new BooksModel;

    $router->get('/', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['auth']($req, $res);

        $res->redirect('/dashboard');
    });

    $router->get('/dashboard', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['auth']($req, $res);

        global $booksModel;

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/dashboard', [
            'title' => 'Tableau de bord',
            'active' => "dashboard",
            'new_books' => $booksModel->getNewBooks()->result,
            'count_user_books' => $booksModel->getCountUserBooks(session('user')['id'])->result
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
        
        global $booksModel;

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/my_books', [
            'title' => 'Mes livres publiés',
            'active' => 'my-books',
            'books' => $booksModel->getUserBooks((int) session('user')['id'])->result
        ]);
    });

    $router->get('/my\-books/create', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        global $model;

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/create_book', [
            'title' => 'Mes livres publiés',
            'active' => 'my-books',
            'categories' => $model->findActives([], 'categories')
        ]);
    });

    $router->get('/my\-library', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        global $booksModel;

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/my_library', [
            'title' => 'Ma bibliothèque',
            'active' => 'my-library',
            'books' => $booksModel->getUserLibraryBooks(session('user')['id'])->result
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
        $userModel = new UsersModel;
        $user = $userModel->findOneById(session('user')['id']);
        $countries = $userModel->findActives([], 'countries');

        // debug($countries);

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/profile', [
            'title' => "Profile",
            'active' => 'profile',
            'user' => $user,
            'countries' => $countries
        ]);
    });
    
    return $router;