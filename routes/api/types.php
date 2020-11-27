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
            $out->message = str_replace('intituled', 'Intitulé', $out->messagex);
        }

        $res->json($out);
    });

    return $router;