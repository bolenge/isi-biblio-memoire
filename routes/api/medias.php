<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Core\Validator;
    use Core\Out;
    use Core\UploadFile;
    use Models\MediasModel;

    $router = new Router;

    $router->post('/create', function (Request $req, Response $res) {
        $out = new Out;

        if ($req->files()->has('media')) {

            $model = new MediasModel;
            $result = UploadFile::upload($req->files()->get('media'));
            

            if ($result->state) {
                $out = $model->create($result->result);
            }else {
                $out->message = implode("<br>", session('errors'));
                $out->message = str_replace('intituled', 'Intitulé', $out->message);
            }
        }else {
            $out->message = "Aucun fichier n'a été envoyé";
        }

        $res->json($out);
    });

    return $router;