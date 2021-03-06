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
         * Signalisation de la lecture du livre
         * @param int $id_user ID de l'utilisateur qui lit
         * @param int $id_book ID du livre
         * @param int $id_chapter ID du chapitre
         * @return Out
         */
        public function readBook(int $id_user, int $id_book, int $id_chapter)
        {
            $chapter_read = $this->findOneActive([
                'cond' => 'id_user='.$id_user.' AND id_book='.$id_book.' AND id_chapter='.$id_chapter
            ], 'user_chapter_book_read');

            if (empty($chapter_read)) {
                $book_read = $this->findOneActive([
                    'cond' => 'id_user='.$id_user.' AND id_book='.$id_book
                ], 'books_read');
                
                $book = $this->findOneActiveById($id_book, 'books');
                $reader = null;
                
                if (empty($book_read)) {
                    $this->add([
                        'id_user' => $id_user,
                        'id_book' => $id_book
                    ], 'user_library');
                    
                    $reader = $this->add([
                        'id_user' => $id_user,
                        'id_book' => $id_book,
                        'nbrChapter' => $this->countActives([
                            'cond' => 'id_book='.$id_book
                        ], 'book_chapters'),
                        'nbrChapterRead' => 1
                    ], 'books_read');
                }else {
                    if ($book_read->nbrChapterRead < $book_read->nbrChapter) {
                        $nbrChapterRead = $book_read->nbrChapterRead + 1;
                        $reader = $this->update([
                            'id' => $book_read->id,
                            'nbrChapterRead' => $nbrChapterRead,
                            'dateEndRead' => $nbrChapterRead == $book_read->nbrChapter ? date('Y-m-d h:i:s') : null
                        ], 'books_read');
                    } else {
                        $reader = true;
                    }
                }
            }else {
                $reader = true;
            }

            if ($reader) {
                $this->out->state = true;
                $this->out->message = "Lecture réussie !";
                $this->out->result = $reader;
            }else {
                $this->out->message = "Erreur de lecture";
            }

            return $this->out;
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

        /**
         * Récupération du livre avec les chapitres
         * @param int $id_book
         * @return Out
         */
        public function getBookWithChapters(int $id_book)
        {
            $book = $this->findOneActive([
                'cond' => 'id='.$id_book
            ], 'books');

            if (!empty($book)) {
                $book->category = $this->findOneActive([
                    'cond' => 'id='.$book->idCategory
                ], 'categories');

                $book->chapters = $this->findActives([
                    'cond' => 'id_book='.$id_book
                ], 'book_chapters');

                $this->out->state = true;
                $this->out->message = "Book trouvé";
                $this->out->result = $book;
                
            } else {
                $this->out->message = "Aucun Book trouvé";
            }
            
            return $this->out;
        }

        /**
         * Récupération du chapitre d'un livre par id du chapitre
         * @param int $id_chapter
         * @return Out
         */
        public function getBookChapterByIdChapter(int $id_chapter)
        {
            $chapter = $this->findOneActiveById($id_chapter, 'book_chapters');

            if (!empty($chapter)) {
                $this->out->state = true;
                $this->out->message = "Chapitre trouvé";
                $this->out->result = $chapter;
                
            } else {
                $this->out->message = "Aucun Book trouvé";
            }
            
            return $this->out;
        }

        /**
         * Signalisation de la lecture du chapitre d'un livre
         * @param int $id_user ID de l'utilisateur qui lit
         * @param int $id_book ID du livre
         * @param int $id_chapter ID du chapitre
         * @return Out
         */
        public function readBookChapter(int $id_user, int $id_book, int $id_chapter)
        {
            $chapter_read = $this->findOneActive([
                'cond' => 'id_user='.$id_user.' AND id_book='.$id_book.' AND id_chapter='.$id_chapter
            ], 'user_chapter_book_read');

            $reader = null;

            if (empty($chapter_read)) {
                $reader = $this->add([
                    'id_user' => $id_user,
                    'id_book' => $id_book,
                    'id_chapter' => $id_chapter,
                ], 'user_chapter_book_read');
            }

            if ($reader) {
                $this->out->state = true;
                $this->out->message = "Lecture réussie !";
                $this->out->result = $reader;
            }else {
                $this->out->message = "Erreur de lecture";
            }

            return $this->out;
        }

        /**
         * Recherche de books
         * @param string $id_user
         * @return Out
         */
        public function searchBooks(string $query)
        {
            $sql = 'SELECT B.id, B.title, B.description, B.createdAt, B.updatedAt, B.state, B.flag, B.statePub, B.other, 
                           B.idUserOwner, B.idCategory, B.fileDoc, B.fileAudio, B.cover, B.dateOfficial, B.datePub,
                           C.intituled AS category, C.description AS descCategory
                    FROM books AS B, categories AS C
                    WHERE B.idCategory = C.id
                      AND B.flag="true"
                      AND B.statePub="true"
                      AND B.state="true"
                      AND (C.intituled LIKE :query OR C.description LIKE :query OR B.title LIKE :query OR B.description LIKE :query)
                    GROUP BY (B.id)
                    ORDER BY id DESC';

            $q = $this->db->prepare($sql);
            $q->execute([
                'query' => '%'.$query.'%'
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
         * Récupération de livres en attente
         * @param int $limit
         * @return Out
         */
        public function getBooksWaiting(int $limit = null)
        {
            $sql = 'SELECT B.id, B.title, B.description, B.createdAt, B.updatedAt, B.state, B.flag, B.statePub, B.other, 
                           B.idUserOwner, B.idCategory, B.fileDoc, B.fileAudio, B.cover, B.dateOfficial, B.datePub,
                           C.intituled AS category, C.description AS descCategory
                    FROM books AS B, categories AS C
                    WHERE B.idCategory = C.id
                      AND B.flag="true"
                      AND B.statePub="false"
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
                $this->out->message = "Aucun livre trouvé";
            }

            return $this->out;
        }

        /**
         * Récupération de livres en publiés
         * @param int $limit
         * @return Out
         */
        public function getBooksPublished(int $limit = null)
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
                $this->out->message = "Aucun livre trouvé";
            }

            return $this->out;
        }

        /**
         * Récupération de books par ID
         * @param int $id
         * @return Out
         */
        public function getBooksById(int $id)
        {
            $product = $this->findOneActiveById($id, 'books');

            if (!empty($product )) {
                $product->category = $this->findOneActiveById($product->idCategory, 'categories');

                $this->out->result = $product;
            }else {
                $this->out->message = "Catégorie envoyée est invalide";
            }

            return $this->out;
        }

        /**
         * Publication de livre
         * @param int $id_book
         * @return Out
         */
        public function publishBook(int $id_book)
        {
            $has_cahpters = $this->countActives([
                'cond' => 'id_book='.$id_book
            ], 'book_chapters');

            if (!empty($has_cahpters)) {

                if (!empty($this->findOneExistsById($id_book, 'books'))) {
                    $published = $this->update([
                        'id' => $id_book,
                        'datePub' => \date('Y-m-d h:i:s'),
                        'statePub' => 'true'
                    ], 'books');

                    if ($published) {
                        $this->out->state = true;
                        $this->out->message = "Publication du livre réussi !";
                        $this->out->result = $published;
                    }else {
                        $this->out->message = "Une erreur est survenue lors de la publication";
                    }
                } else {
                    $this->out->message = "Ce livre n'existe pas";
                }   
            }else {
                $this->out->message = "Ce livre ne peut pas être publié, il n'a aucun chapitre";
            }

            return $this->out;
        }

        /**
         * Récupération de nombre de books que l'utilisateur a lu, ou en cours de lecture
         * @return Out
         */
        public function getCountBooksPublished()
        {
            $count = $this->countActives([
                'cond' => 'datePub != "null"'
            ], 'books');

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
    }