<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Core\Validator;
    use Core\Out;
    use Models\BooksModel;

    $router = new Router;
    $modelBooks = new BooksModel;
    $out = new Out;

    $router->post('/create', function (Request $req, Response $res) {
        global $modelBooks;
        global $out;

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
            $out = $modelBooks->create($req);
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

    /**
     * Route création d'un chapitre pour un livre
     */
    $router->post('/chapters/create', function (Request $req, Response $res) {
        global $modelBooks;
        global $out;

        $validator = new Validator($req);

        $validator->setRules([
            'admin' => "required|int",
            'book' => "required|int",
            'title' => "required|min:2|max:150",
            'content' => "required|min:5",
        ]);

        if ($validator->validator()) {
            $folder_content = "public/medias/books/".$req->body()->book.'/chapters';

            create_folder($folder_content);

            $filename = $folder_content.'/'.date('d-m-Y-h-i-s-t').'.html';

            if (write_file($filename, $req->body()->content)) {
                $out = $modelBooks->createChapter($req, $filename);
            }else {
                $out->message = "Une erreur est survenue, réessayez";
            }
        }else {
            session('errors')['admin'] = "Admin invalide";
            session('errors')['book'] = "Livre invalide";
            
            $out->message = implode("<br>", session('errors'));
            $out->message = str_replace('title', 'Titre', $out->message);
            $out->message = str_replace('book', 'Livre', $out->message);
            $out->message = str_replace('content', 'Contenu', $out->message);

            session("errors", null);
            session()->remove("errors");
        }

        $res->json($out);
    });

    /**
     * Route de recherche d'un livre
     */
    $router->post('/search', function (Request $req, Response $res) {
        $model = new BooksModel;
        $res->json($model->searchBooks($req->body()->query));
    });

    /**
     * Route d epublication d'un livre
     */
    $router->post('/publish', function (Request $req, Response $res) {
        $model = new BooksModel;
        $res->json($model->publishBook((int) $req->body()->book));
    });

    /**
     * Route de suppression d'un livre
     */
    $router->delete('/delete/:id', function (Request $req, Response $res) {
        $model = new BooksModel;
        $out = new Out;

        $result = $model->update([
            'id' => $req->params()->get('id'),
            'flag' => 'false'
        ], 'books');

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
     * Route du début de la lecture d'un livre
     */
    $router->post('/read/:id', function (Request $req, Response $res) {
        $booksModel = new BooksModel;
        $out = new Out;

        $result = $booksModel->getBookWithChapters((int) $req->params()->get('id'))->result;
        $chapters = null;

        if (!empty($result)) {
            $chapters = !empty($result->chapters) ? $result->chapters : null;
            $out = $booksModel->readBook(session('user')['id'], (int) $req->params()->get('id'), $chapters[0]->id);

            if (!empty($chapters)) {
                $booksModel->readBookChapter(session('user')['id'], (int) $req->params()->get('id'), $chapters[0]->id);
            }
        }else {
            $out->message = "Erreur de lecture, réessayez ou actualisez la page";
        }

        $res->json($out);
    });

    return $router;