<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Core\Validator;
    use Core\Out;
    use Models\UsersModel;

    $router = new Router;

    /**
     * Inscription d'un utilisateur
     */
    $router->post('/register', function (Request $req, Response $res) {

        $model = new UsersModel;
        $out = new Out;
        $validator = new Validator($req);

        $validator->setRules([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if ($validator->validator()) {
            $user = [
                'name' => $req->body()->name,
                'email' => $req->body()->email,
                'password' => $req->body()->password
            ];

            $out = $model->registerUser($user);
        }else {
            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('name', 'Nom', $out->message);
            $out->message = str_replace('password', 'Mot de passe', $out->messagex);
        }

        $res->json($out);
    });

     /**
     * Connexion d'un utilisateur
     */
    $router->post('/login', function (Request $req, Response $res) {

        $model = new UsersModel;
        $out = new Out;
        $validator = new Validator($req);

        $validator->setRules([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if ($validator->validator()) {
            $out = $model->loginUser($req);
        }else {
            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('name', 'Nom', $out->message);
            $out->message = str_replace('password', 'Mot de passe', $out->messagex);
        }

        $res->json($out);
    });
    
    return $router;