<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Models\UsersModel;
    use Core\Validator;
    use Core\Out;
    use Core\Model;

    $adminMiddleware = require('./middlewares/admins.php');
    $router = new Router;
    $model = new Model;
    
    $router->get('/', function (Request $req, Response $res) {
        $res->redirect('/admin/dashboard');
    });

    $router->get('/dashboard', function (Request $req, Response $res) {
        global $adminMiddleware;
        $adminMiddleware['auth']($req, $res);

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
        global $adminMiddleware;
        $adminMiddleware['auth']($req, $res);

        global $model;
        
        
        $res->extends('layouts/dashboard_admin');
        $res->render('dashboard/admin/types', [
            'title' => "Liste de type de catégories",
            'active' => 'categories',
            'types' => $model->findExists([], "types")
        ]);
        
    });

    /**
     * Route de catégorie
     */
    $router->get('/categories', function (Request $req, Response $res) {
        global $adminMiddleware;
        $adminMiddleware['auth']($req, $res);

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
        global $adminMiddleware;
        $adminMiddleware['auth']($req, $res);

        $res->extends('layouts/dashboard_admin');
        $res->render('dashboard/admin/others', [
            'title' => "Liste de catégories de livres",
            'active' => 'others'
        ]);
    });

    /**
     * Route des auteurs
     */
    $router->get('/login', function (Request $req, Response $res) {
        //debug(session());
        global $adminMiddleware;
        $adminMiddleware['gess']($req, $res);

        $res->extends('layouts/blank');
        $res->render('dashboard/admin/login', [
            'title' => "Connexion administrateur",
            'active' => 'admin'
        ]);
    });
    
    return $router;