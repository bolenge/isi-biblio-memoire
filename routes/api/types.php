<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Core\Validator;
    use Core\Out;
    use Models\TypesModel;

    $router = new Router;

    $router->post('/create', function (Request $req, Response $res) {
        $model = new TypesModel;
        $out = new Out;
        $validator = new Validator($req);

        $validator->setRules([
            'intituled' => 'required|min:3|max:200',
            'description' => 'required|min:5'
        ]);

        if ($validator->validator()) {
            $out = $model->create($req);
        }else {
            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('intituled', 'Intitulé', $out->message);
        }

        $res->json($out);
    });

    /**
     * Route de récupération d'un type par son ID
     */
    $router->get('/:id', function (Request $req, Response $res) {
        $model = new TypesModel;
        $out = new Out;
        $type = $model->findOneExistsById($req->params()->get('id'));

        if (!empty($type)) {
            $out->state = true;
            $out->message = "Type trouvé avec succès";
            $out->result = $type;
        }else {
            $out->message = "Aucun type trouvé";
        }

        $res->json($out);
    });

    /**
     * Route Edition type
     */
    $router->put('/update/:id', function (Request $req, Response $res) {
        $model = new TypesModel;
        $out = new Out;
        $validator = new Validator($req);

        $validator->setRules([
            'intituled' => 'required|min:3|max:200',
            'description' => 'required|min:5'
        ]);

        if ($validator->validator()) {
            $result = $model->update([
                'id' => $req->params()->get('id'),
                'intituled' => $req->body()->intituled,
                'description' => $req->body()->description,
            ]);

            if ($result) {
                $out->state = true;
                $out->message = "Mise à jou réussie !";
                $out->result = $result;
            } else {
                $out->message = "Une erreur est survenue lors de la mise à jour !";
            }
            
        }else {
            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('intituled', 'Intitulé', $out->message);
        }

        $res->json($out);
    });

    /**
     * Route de suppression d'un type
     */
    $router->delete('/delete/:id', function (Request $req, Response $res) {
        $model = new TypesModel;
        $out = new Out;

        $result = $model->update([
            'id' => $req->params()->get('id'),
            'flag' => 'false'
        ]);

        if ($result) {
            $out->state = true;
            $out->message = "Suppression réussie !";
            $out->result = $result;
        } else {
            $out->message = "Une erreur est survenue lors de la suppression !";
        }

        $res->json($out);
    });

    /**
     * Route de récupération de types actives
     */
    $router->get('/all/actives', function (Request $req, Response $res){
        $res->json((new TypesModel)->allActives());
    });

    return $router;