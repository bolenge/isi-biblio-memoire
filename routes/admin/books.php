<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Models\BooksModel;
    use Core\Validator;
    use Core\Out;

    $router = new Router;
    $adminMiddleware = require('./middlewares/admins.php');
    $booksModel = new BooksModel;

    /**
     * Route de livres en attente
     */
    $router->get('/waiting', function (Request $req, Response $res) {
        global $adminMiddleware;

        $adminMiddleware["auth"]($req, $res);

        global $booksModel;

        $res->extends('layouts/dashboard_admin');
        $res->render('dashboard/admin/books/waiting', [
            'title' => "Administration ".config('app.name'),
            'active' => 'books',
            'books' => $booksModel->getBooksWaiting()->result
        ]);
        
    });

    /**
     * Route de livres publiés
     */
    $router->get('/published', function (Request $req, Response $res) {
        global $adminMiddleware;

        $adminMiddleware["auth"]($req, $res);

        global $booksModel;

        $res->extends('layouts/dashboard_admin');
        $res->render('dashboard/admin/books/published', [
            'title' => "Administration ".config('app.name'),
            'active' => 'books',
            'books' => $booksModel->getBooksPublished()->result
        ]);
        
    });

    /**
     * Route de la publication d'un livre
     */
    $router->get('/publish', function (Request $req, Response $res) {
        global $adminMiddleware;

        $adminMiddleware["auth"]($req, $res);

        global $booksModel;

        $res->extends('layouts/dashboard_admin');
        $res->render('dashboard/admin/books/publish', [
            'title' => "Publication du livre ",
            'active' => 'books',
        ]);
        
    });
    
    return $router;