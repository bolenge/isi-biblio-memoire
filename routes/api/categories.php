<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Core\Validator;
    use Core\Out;
    use Models\CategoriesModel;

    $router = new Router;

    $router->post('/create', function (Request $req, Response $res) {
        $model = new CategoriesModel;
        $out = new Out;
        $validator = new Validator($req);

        $validator->setRules([
            'id_type' => 'required|int',
            'intituled' => 'required|min:3|max:200',
            'description' => 'required|min:5'
        ]);

        if ($validator->validator()) {
            $out = $model->create($req);
        }else {
            session('errors')['id_type'] = "Type invalide";
            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('intituled', 'Intitulé', $out->message);
            $out->message = str_replace('id_type', 'Type', $out->message);
        }

        $res->json($out);
    });

    return $router;