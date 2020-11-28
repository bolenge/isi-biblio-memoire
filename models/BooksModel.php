<?php
    namespace Models;

    use Core\Model;
    use Core\Out;
    use Ekolo\Builder\Http\Request;

    class BooksModel extends Model {

        public function __construct()
        {
            parent::__construct();
            $this->setTable('books');
        }

        /**
         * Création d'un type de catégorie
         */
        public function create(Request $req)
        {
            $out = new Out;
            $book = $this->add([
                'title' => $req->body()->title,
                'description' => $req->body()->description,
                'idCategory' => (int) $req->body()->category,
                'idUserOwner' => (int) $req->body()->owner,
                'other' => $req->body()->other,
                'fileDoc' => $req->body()->file_doc,
                'cover' => $req->body()->cover,
                'fileAudio' => $req->body()->file_audio,
                'dateOfficial' => $req->body()->date_official,
            ]);

            if ($book) {
                $out->state = true;
                $out->message = "Book créé avec succès";
                $out->result = $book;
            }else {
                $out->message = "Une erreur est survenue lors de la création du book";
            }

            return $out;
        }
    }