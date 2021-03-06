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
            $out->message = str_replace('password', 'Mot de passe', $out->message);
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

            if ($out->state) {
                session('user', [
                    'state' => $out->result->state,
                    'name' => $out->result->name,
                    'firstName' => $out->result->firstName,
                    'lastName' => $out->result->lastName,
                    'email' => $out->result->email,
                    'id' => $out->result->id
                ]);

                if ($req->body()->remember) {
                    setcookie('user_remember', base64_encode(encode_id($out->result->id).'_'.$out->result->email), time() + (86400 * 30), "/");
                }
            }
        }else {
            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('password', 'Mot de passe', $out->message);
        }

        $res->json($out);
    });

    /**
     * D??connexion d'un utilisateur
     */
    $router->put('/logout', function (Request $req, Response $res) {

        $model = new UsersModel;

        $out = $model->logout([
            'id_user' => session('user')['id'],
            'dateLogout' => date('Y-m-d h:i:s')
        ]);

        if ($out->state) {
            session('user', null);
            session()->remove('user');
            setcookie('user_remember', null, -1, '/');
        }

        $res->json($out);
    });

    /**
     * R??cup??ration des informations d'un utilisateur
     */
    $router->get('/infos/:id', function (Request $req, Response $res) {

        $model = new UsersModel;

        $out = $model->logout([
            'id_user' => session('user')['id'],
            'dateLogout' => date('Y-m-d h:i:s')
        ]);

        if ($out->state) {
            session('user', null);
            session()->remove('user');
        }

        $res->json($out);
    });

    /**
     * Inscription d'un utilisateur
     */
    $router->put('/update', function (Request $req, Response $res) {

        $model = new UsersModel;
        $out = new Out;
        $validator = new Validator($req);

        $validator->setRules([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'firstName' => 'required|min:2',
            'phone' => 'required|tel',
            'country' => 'required|int',
            'town' => 'required|alpha|min:1',
            'adress' => 'required|alpha|min:3'
        ]);

        if ($validator->validator()) {
            $out = $model->updateUser($req, session('user')['id']);
        }else {
            session('errors')['country'] = "Pays invalide";

            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('name', 'Nom', $out->message);
            $out->message = str_replace('firstName', 'Pr??nom', $out->message);
            $out->message = str_replace('phone', 'T??l??phone', $out->message);
            $out->message = str_replace('country', 'Pays', $out->message);
            $out->message = str_replace('town', 'Ville', $out->message);
            $out->message = str_replace('adress', 'Adresse', $out->message);

            session()->remove('errors');
        }

        $res->json($out);
    });
    
    return $router;