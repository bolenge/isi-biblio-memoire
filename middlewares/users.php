<?php
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;

    return [
        'auth' => function (Request $req, Response $res) {
            if (!session('user')) {
                $res->redirect('/login');
            }
        },

        'gess' => function (Request $req, Response $res) {
            if (session('user') && $req->uri() == "/login" && $req->uri() == "/register") {
                $res->redirect('/dashboard');
            }
        },
    ];

    