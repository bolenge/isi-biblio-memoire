<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Core\Validator;
    use Core\Out;
    use Models\UsersModel;

    $router = new Router;

    /**
     * Création d'un utilisateur
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
                'password' => bcrypt_hash_password($req->body()->password),
            ];

            if (!empty($userResult = $model->createUser($user))) {
                $out->state = true;
                $out->message = "Votre inscription a réussi !<br> Un mail d'activation de votre compte a été envoyé à votre Email";
            }else {
                $out->result = $userResult;
                $out->message = "Une erreur est survenue lors de l'inscription, réessayez !";
            }
        }else {
            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('name', 'Nom', $out->message);
            $out->message = str_replace('password', 'Mot de passe', $out->messagex);
        }

        $res->json($out);
    });
    
    return $router;