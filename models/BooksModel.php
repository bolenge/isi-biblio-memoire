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
            $this->out = new Out;
        }

        /**
         * Création d'un type de catégorie
         * @param Request $req
         * @return Out
         */
        public function create(Request $req)
        {
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
                $this->out->state = true;
                $this->out->message = "Book créé avec succès";
                $this->out->result = $book;
            }else {
                $this->out->message = "Une erreur est survenue lors de la création du book";
            }

            return $this->out;
        }

        /**
         * Récupération de livres d'un user
         * @param int $id_user
         * @return Out
         */
        public function getUserBooks(int $id_user)
        {
            $sql = 'SELECT B.id, B.title, B.description, B.createdAt, B.updatedAt, B.state, B.flag, B.statePub, 
                           B.idUserOwner, B.idCategory, B.fileDoc, B.fileAudio, B.cover, B.dateOfficial, B.datePub,
                           C.intituled AS category, C.description AS descCategory
                    FROM books AS B, categories AS C
                    WHERE B.idUserOwner = :owner
                      AND B.idCategory = C.id
                      AND B.flag="true"
                      AND B.state="true"';

            $q = $this->db->prepare($sql);
            $q->execute([
                'owner' => $id_user
            ]);
            $books = $q->fetchAll(\PDO::FETCH_OBJ);

            if (!empty($books)) {
                $this->out->state = true;
                $this->out->message = "Livres trouvés avec succès";
                $this->out->result = $books;
            }else {
                $this->out->message = "Aucun livre trouvé pour cet utilisateur";
            }

            return $this->out;
        }

        /**
         * Récupération de nouveaux livres
         * @param int $id_user
         * @return Out
         */
        public function getNewBooks(int $limit = null)
        {
            $sql = 'SELECT B.id, B.title, B.description, B.createdAt, B.updatedAt, B.state, B.flag, B.statePub, B.other, 
                           B.idUserOwner, B.idCategory, B.fileDoc, B.fileAudio, B.cover, B.dateOfficial, B.datePub,
                           C.intituled AS category, C.description AS descCategory
                    FROM books AS B, categories AS C
                    WHERE B.idCategory = C.id
                      AND B.flag="true"
                      AND B.statePub="true"
                      AND B.state="true"';

            $sql .= ' ORDER BY id DESC';
            $sql .= !empty($limit) ? ' LIMIT '.$limit : '';

            $q = $this->db->prepare($sql);
            $q->execute();
            $books = $q->fetchAll(\PDO::FETCH_OBJ);

            if (!empty($books)) {
                $this->out->state = true;
                $this->out->message = "Livres trouvés avec succès";
                $this->out->result = $books;
            }else {
                $this->out->message = "Aucun nouveau livre trouvé";
            }

            return $this->out;
        }
    }