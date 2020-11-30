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

        /**
         * Récupération de nombre de livres d'un user
         * @param int $id_user
         * @return Out
         */
        public function getCountUserBooks(int $id_user)
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
                $this->out->result = !empty($books) ? count($books) : 0;
            }else {
                $this->out->message = "Aucun livre trouvé pour cet utilisateur";
            }

            return $this->out;
        }

        /**
         * Signalisation de la lecture d'un livre
         * @param int $id_user
         * @param int $id_user
         * @return Out
         */
        public function readBook(int $id_user, int $id_book)
        {
            # code...
        }

        /**
         * Récupération de books de la librairie de l'utilisateur
         * @param int $id_user
         * @return Out
         */
        public function getUserLibraryBooks(int $id_user)
        {
            $sql = 'SELECT B.id, B.title, B.description, B.createdAt, B.updatedAt, B.state, B.flag, B.statePub, B.other, 
                           B.idUserOwner, B.idCategory, B.fileDoc, B.fileAudio, B.cover, B.dateOfficial, B.datePub,
                           C.intituled AS category, C.description AS descCategory, 
                           L.id AS id_user_libray, L.createdAt AS createdUserLibray, L.updatedAt AS updatedUserLibrary
                    FROM books AS B, categories AS C, user_library AS L
                    WHERE B.idCategory = C.id
                      AND B.id=L.id_book
                      AND L.id_user=:user
                      AND B.flag="true"
                      AND B.statePub="true"
                      AND B.state="true"';

            $sql .= ' ORDER BY id DESC';
            $sql .= !empty($limit) ? ' LIMIT '.$limit : '';

            $q = $this->db->prepare($sql);
            $q->execute([
                'user' => $id_user
            ]);
            
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

        /**
         * Récupération de books que l'utilisateur a lu, ou en cours de lecture
         * @param int $id_user
         * @return Out
         */
        public function getUserBooksRead(int $id_user)
        {
            $sql = 'SELECT B.id, B.title, B.description, B.createdAt, B.updatedAt, B.state, B.flag, B.statePub, B.other, 
                           B.idUserOwner, B.idCategory, B.fileDoc, B.fileAudio, B.cover, B.dateOfficial, B.datePub, B.idUserOwner,
                           C.intituled AS category, C.description AS descCategory, 
                           BR.id AS id_book_read, BR.dateRead, BR.dateEndRead, BR.nbrChapter, BR.nbrChapterRead, BR.id_user
                    FROM books AS B, categories AS C, books_read AS BR
                    WHERE B.idCategory = C.id
                      AND B.id=BR.id_book
                      AND BR.id_user=:user
                      AND B.flag="true"
                      AND B.statePub="true"
                      AND B.state="true"';

            $sql .= ' ORDER BY id DESC';
            $sql .= !empty($limit) ? ' LIMIT '.$limit : '';

            $q = $this->db->prepare($sql);
            $q->execute([
                'user' => $id_user
            ]);
            
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

        /**
         * Récupération de books par catégorie
         * @param int $id_category
         * @return Out
         */
        public function getBooksByCategory(int $id_category)
        {
            $category = $this->findOneActive([
                'cond' => 'id='.$id_category
            ], 'categories');

            if (!empty($category)) {
                $category->books = $this->findActives([
                    'cond' => 'idCategory='.$id_category
                ], 'books');

                $this->out->result = $category;
            }else {
                $this->out->message = "Catégorie envoyée est invalide";
            }

            return $this->out;
        }

        /**
         * Récupération de nombre de books que l'utilisateur a lu, ou en cours de lecture
         * @param int $id_user
         * @return Out
         */
        public function getCountUserBooksRead(int $id_user)
        {
            $count = $this->countActives([
                'cond' => 'id_user='.$id_user
            ], 'books_read');

            if ($count > 0) {
                $this->out->state = true;
                $this->out->message = "Livres trouvés";
                $this->out->result = $count;
            }else {
                $this->out->message = "Cet utilisateur n'a lu aucun livre";
                $this->out->result = 0;
            }

            return $this->out;
        }

        /**
         * Récupération de nombre de books que l'utilisateur est encours de lecture
         * @param int $id_user
         * @return Out
         */
        public function getCountUserBooksReading(int $id_user)
        {
            $count = $this->countActives([
                'cond' => 'id_user='.$id_user.' AND dateEndRead=null'
            ], 'books_read');

            if ($count > 0) {
                $this->out->state = true;
                $this->out->message = "Livres trouvés";
                $this->out->result = $count;
            }else {
                $this->out->message = "Cet utilisateur n'est encoure d'aucun livre";
                $this->out->result = 0;
            }

            return $this->out;
        }

        /**
         * Récupération de nombre de nouveaux books
         * @return Out
         */
        public function getCountNewBooks()
        {
            $count = $this->countActives([
                'cond' => 'statePub="true" AND (datePub BETWEEN "'.\remove_days_in_date(new \DateTime, 10).'" AND "'.\date_format((new \DateTime), 'Y-m-d h:i:s').'")'
            ], 'books');

            if ($count > 0) {
                $this->out->state = true;
                $this->out->message = "Livres trouvés";
                $this->out->result = $count;
            }else {
                $this->out->message = "Aucun nouveau livre";
                $this->out->result = 0;
            }

            return $this->out;
        }

        /**
         * Création d'un chapitre du livre
         * @param Request $req
         * @param string $filename
         * @return Out
         */
        public function createChapter(Request $req, string $filename)
        {
            if ($this->exists('id', $req->body()->admin, 'admins')) {
                $chapter = $this->add([
                    'title' => $req->body()->title,
                    'filename' => $filename,
                    'id_admin' => (int) $req->body()->admin,
                    'id_book' => (int) $req->body()->book,
                ], 'book_chapters');

                if ($chapter) {
                    $this->out->state = true;
                    $this->out->message = "Chapitre créé avec succès";
                    $this->out->result = $chapter;
                }else {
                    $this->out->message = "Une erreur est survenue lors de la création du chapitre";
                }
            } else {
                $this->out->message = "Admin invalide";
            }

            return $this->out;
        }
    }