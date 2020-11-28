<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Core\Validator;
    use Core\Out;
    use Models\BooksModel;

    $router = new Router;

    $router->post('/create', function (Request $req, Response $res) {
        $model = new BooksModel;
        $out = new Out;
        $validator = new Validator($req);

        $validator->setRules([
                'title' => "required|min:2|max:150",
                'description' => "required|min:5|max:500",
                'category' => "required|int",
                'other' => "required|min:2",
                'file_doc' => "required",
                'date_official' => "required"
        ]);

        if ($validator->validator()) {
            $out = $model->create($req);
        }else {
            session('errors')['category'] = "Catégorie invalide";
            
            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('title', 'Titre', $out->message);
            $out->message = str_replace('category', 'Catégorie', $out->message);
            $out->message = str_replace('other', 'Auteur', $out->message);
            $out->message = str_replace('file_doc', 'Fichier docmuent du livre', $out->message);
            $out->message = str_replace('date_official', 'Date de officielle du livre', $out->message);

            session("errors", null);
            session()->remove("errors");
        }

        $res->json($out);
    });

    return $router;