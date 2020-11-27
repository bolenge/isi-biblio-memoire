<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Models\UsersModel;
    use Core\Validator;
    use Core\Out;


    $router = new Router;
    $userMiddleware = require('./middlewares/users.php');
    
    $router->post('/update', function (Request $req, Response $res) {
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

            session('flash', [
                'type' => 'success',
                'message' => $out->message
            ]);
        }else {
            session('errors')['country'] = "Pays invalide";

            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('name', 'Nom', $out->message);
            $out->message = str_replace('firstName', 'Prénom', $out->message);
            $out->message = str_replace('phone', 'Téléphone', $out->message);
            $out->message = str_replace('country', 'Pays', $out->message);
            $out->message = str_replace('town', 'Ville', $out->message);
            $out->message = str_replace('adress', 'Adresse', $out->message);

            session('flash', [
                'type' => 'danger',
                'message' => $out->message
            ]);

            session()->remove('errors');
        }

        $res->redirect('/profile');
    });

    return $router;