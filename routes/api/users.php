<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Core\Validator;
    use Core\Out;
    use Models\UsersModel;

    $router = new Router;

    $router->post('/register', function (Request $req, Response $res) {
        $model = new UsersModel;
        $out = new Out;
        $validator = new Validator;

        $validator->setRules([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if ($validator->validator()) {
            $user = [
                'name' => $req->body->name,
                'email' => $req->body->email,
                'password' => bcrypt_hash_password($req->body->password),
            ];

            if (!empty($userResult = $model->createUser())) {
                $out->state = true;
                $out->message = "Votre inscription a réussi !";
                $out->result = $userResult;
            }else {
                $out->message = "Une erreur est survenue lors de l'inscription, réessayez !";
            }
        }else {
            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('name', 'Nom');
            $out->message = str_replace('password', 'Mot de passe');
        }

        $res->json($out);
    });
    
    return $router;