<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Core\Validator;
    use Core\Out;
    use Models\CategoriesModel;

    $router = new Router;

    /**
     * Route de création de catégorie
     */
    $router->post('/create', function (Request $req, Response $res) {
        $model = new CategoriesModel;
        $out = new Out;
        $validator = new Validator($req);

        $validator->setRules([
            'type' => 'required|int',
            'intituled' => 'required|min:3|max:200',
            'description' => 'required|min:5'
        ]);

        if ($validator->validator()) {
            $out = $model->create($req);
        }else {
            session('errors')['type'] = "Type invalide";
            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('intituled', 'Intitulé', $out->message);
        }

        $res->json($out);
    });

    /**
     * Route de récupération de catégories actives
     */
    $router->get('/all/actives', function (Request $req, Response $res){
        $res->json((new CategoriesModel)->allActives());
    });

    /**
     * Route de récupération du nombre de catégories actives
     */
    $router->get('/count/actives', function (Request $req, Response $res){
        $res->json((new CategoriesModel)->countAllActives());
    });

    /**
     * Récupération des informations d'une catégorie pour son édition
     */
    $router->get('/for/update/:id', function (Request $req, Response $res) {

        $model = new CategoriesModel;
        $out = new Out;
        $category = $model->findOneExistsById($req->params()->get('id'));

        if (!empty($category)) {
            $out->state = true;
            $out->message = "Catégorie trouvée avec succès";
            $out->result = [
                "category" => $category,
                "types" => $model->findActives([], "types")
            ];
        }else {
            $out->message = "Aucun catégorie trouvé";
        }

        $res->json($out);
    });

    /**
     * Route updating category
     */
    $router->put('/update/:id', function (Request $req, Response $res) {
        $model = new CategoriesModel;
        $out = new Out;
        $validator = new Validator($req);

        $validator->setRules([
            'type' => 'required|int',
            'intituled' => 'required|min:3|max:200',
            'description' => 'required|min:5'
        ]);

        if ($validator->validator()) {
            $result = $model->update([
                'id' => $req->params()->get('id'),
                'idType' => $req->body()->type,
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
            session('errors')['type'] = "Type invalide";
            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('intituled', 'Intitulé', $out->message);

            session("errors", null);
            session()->remove("errors");
        }

        $res->json($out);
    });

    /**
     * Route de suppression d'une catégorie
     */
    $router->delete('/delete/:id', function (Request $req, Response $res) {
        $model = new CategoriesModel;
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

    return $router;