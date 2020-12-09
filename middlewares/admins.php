<?php
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;

    return [
        'auth' => function (Request $req, Response $res)
            {
            if (!session('admin')) {
                $res->redirect('/admin/login');
            }
        },

        'gess' => function (Request $req, Response $res)
            {
            if (session('admin') && $req->uri() == "/admin/login") {
                $res->redirect('/admin/dashboard');
            }
        },
    ];

    