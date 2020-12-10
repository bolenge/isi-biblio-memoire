<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Core\Validator;
    use Core\Out;
    use Models\AdminsModel;

    $router = new Router;
    $modelAdmin = new AdminsModel;
    $out = new Out;

    /**
     * Route création admin
     */
    $router->post('/create', function (Request $req, Response $res) {
        global $modelAdmin;
        global $out;
        
        $validator = new Validator($req);

        $validator->setRules([
            'name' => 'required|min:2',
            'firstName' => 'required|min:2',
            'email' => 'required|email',
            'phone' => 'required|tel',
            'password' => 'required|min:8',
            'username' => 'required|min:2',
        ]);

        if ($validator->validator()) {
            $out = $modelAdmin->createAdmin($req);
        }else {
            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('name', 'Nom', $out->message);
            $out->message = str_replace('firstName', 'Prénom', $out->message);
            $out->message = str_replace('phone', 'Téléphone', $out->message);
            $out->message = str_replace('username', 'Nom d\'utilisateur', $out->message);
            $out->message = str_replace('password', 'Mot de passe', $out->message);

            session('errors', null);
            session()->remove('errors');
        }

        $res->json($out);
    });

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
     * Connexion d'un admin
     */
    $router->post('/login', function (Request $req, Response $res) {
        global $modelAdmin;
        global $out;

        $validator = new Validator($req);

        $validator->setRules([
            'username' => 'required',
            'password' => 'required|min:8'
        ]);

        if ($validator->validator()) {
            $out = $modelAdmin->loginAdmin($req);

            if ($out->state) {
                session('admin', [
                    'state' => $out->result->state,
                    'name' => $out->result->name,
                    'firstName' => $out->result->firstName,
                    'email' => $out->result->email,
                    'id' => $out->result->id
                ]);
            }
        }else {
            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('password', 'Mot de passe', $out->message);
        }

        $res->json($out);
    });

    /**
     * Déconnexion d'un admin
     */
    $router->put('/logout', function (Request $req, Response $res) {
        global $modelAdmin;

        $out = $modelAdmin->logout([
            'id_admin' => session('admin')['id'],
            'dateLogout' => date('Y-m-d h:i:s')
        ]);

        if ($out->state) {
            session('admin', null);
            session()->remove('admin');
        }

        $res->json($out);
    });

    /**
     * Récupération des informations d'un utilisateur
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
            $out->message = str_replace('firstName', 'Prénom', $out->message);
            $out->message = str_replace('phone', 'Téléphone', $out->message);
            $out->message = str_replace('country', 'Pays', $out->message);
            $out->message = str_replace('town', 'Ville', $out->message);
            $out->message = str_replace('adress', 'Adresse', $out->message);

            session()->remove('errors');
        }

        $res->json($out);
    });
    
    return $router;