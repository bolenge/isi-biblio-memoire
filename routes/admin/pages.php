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
            'title' => "Administration ".config('app.name'),
            'active' => 'dashboard'
        ]);
        
    });

    /**
     * Route de type de catégorie
     */
    $router->get('/types', function (Request $req, Response $res) {
        $res->extends('layouts/dashboard_admin');
        $res->render('dashboard/admin/types', [
            'title' => "Liste de type de catégories",
            'active' => 'categories'
        ]);
        
    });

    /**
     * Route de catégorie
     */
    $router->get('/categories', function (Request $req, Response $res) {
        $res->extends('layouts/dashboard_admin');
        $res->render('dashboard/admin/categories', [
            'title' => "Liste de catégories de livres",
            'active' => 'categories'
        ]);
        
    });

    /**
     * Route des auteurs
     */
    $router->get('/others', function (Request $req, Response $res) {
        $res->extends('layouts/dashboard_admin');
        $res->render('dashboard/admin/others', [
            'title' => "Liste de catégories de livres",
            'active' => 'others'
        ]);
        
    });
    
    return $router;