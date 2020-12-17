<?php
    use Ekolo\Builder\Routing\Router;
    use Ekolo\Builder\Http\Request;
    use Ekolo\Builder\Http\Response;
    use Models\UsersModel;
    use Models\BooksModel;
    use Core\Model;

    $model = new Model;
    $router = new Router;
    $userMiddleware = require('./middlewares/users.php');
    $booksModel = new BooksModel;
    $userModel = new UsersModel;

    /**
     * Route menant a la page d'accueil
     */
    $router->get('/', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['auth']($req, $res);

        $res->redirect('/dashboard');
    });

    /**
     * Route menant à la page dashboard de l'utilisateur
     */
    $router->get('/dashboard', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['auth']($req, $res);

        global $booksModel;
        
        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/dashboard', [
            'title' => 'Tableau de bord',
            'active' => "dashboard",
            'new_books' => $booksModel->getNewBooks()->result,
            'count_user_books' => $booksModel->getCountUserBooks(session('user')['id'])->result,
            'count_user_books_read' => $booksModel->getCountUserBooksRead(session('user')['id'])->result,
            'count_user_books_reading' => $booksModel->getCountUserBooksReading(session('user')['id'])->result,
            'count_new_books' => $booksModel->getCountNewBooks()->result,
        ]);
    });
    
    /**
     * Route menant à la page login de l'utilisateur
     */
    $router->get('/login', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        global $userModel;

        $user_remember_cookie = getcookie('user_remember');

        if (!empty($user_remember_cookie)) {
            $token_user_remember = explode('_', base64_decode($user_remember_cookie));
            $email_user = $token_user_remember[1];
            $id_user = decode_id($token_user_remember[0]);

            $outUser = $userModel->getUserById((int) $id_user);

            if (!empty($outUser->state)) {
                if ($email_user == $outUser->result->email) {
                    session('user', [
                        'state' => $outUser->result->state,
                        'name' => $outUser->result->name,
                        'firstName' => $outUser->result->firstName,
                        'lastName' => $outUser->result->lastName,
                        'email' => $outUser->result->email,
                        'id' => $outUser->result->id
                    ]);

                    $res->redirect('/dashboard');
                }
            }
        }
        
        $res->extends('layouts/signin');
        $res->render('pages/login', [
            'title' => "Connexion"
        ]);
    });

    /**
     * Route menant à la page de l'inscription de l'utilisateur
     */
    $router->get('/register', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        $res->extends('layouts/signin');
        $res->render('pages/register', [
            'title' => "Création de compte"
        ]);
    });

    /**
     * Route menant à la page de livres de k'utilisateur
     */
    $router->get('/my\-books', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['auth']($req, $res);
        
        global $booksModel;

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/my_books', [
            'title' => 'Mes livres publiés',
            'active' => 'my-books',
            'books' => $booksModel->getUserBooks((int) session('user')['id'])->result
        ]);
    });

    /**
     * Route menant à la page de creation d'un livre
     */
    $router->get('/my\-books/create', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['auth']($req, $res);

        global $model;

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/create_book', [
            'title' => 'Mes livres publiés',
            'active' => 'my-books',
            'categories' => $model->findActives([], 'categories')
        ]);
    });

    /**
     * Route menant à la page de la librairie de l'utilisateur
     */
    $router->get('/my\-library', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['auth']($req, $res);

        global $booksModel;

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/my_library', [
            'title' => 'Ma bibliothèque',
            'active' => 'my-library',
            'books' => $booksModel->getUserLibraryBooks(session('user')['id'])->result
        ]);
    });

    /**
     * Route menant à la page de livres en plein lecture de l'utilisateur
     */
    $router->get('/my\-reader', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['auth']($req, $res);

        global $booksModel;

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/my_reader', [
            'title' => 'Ma bibliothèque',
            'active' => 'my-reader',
            'books' => $booksModel->getUserBooksRead(session('user')['id'])->result
        ]);
    });

    /**
     * Route de la lecture d'un livre
     */
    $router->get('/books/:id', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['auth']($req, $res);

        global $booksModel;

        $last_chapter_read = $booksModel->findOneActive([
            'cond' => 'id_user='.session('user')['id'].' AND id_book='.$req->params()->get('id'),
            'order'=> 'id DESC'
        ], 'user_chapter_book_read');

        if (!empty($last_chapter_read)) {
            $res->redirect('/books/'.$req->params()->get('id').'/chapters/'.$last_chapter_read->id_chapter);
        }

        $result = $booksModel->getBookWithChapters((int) $req->params()->get('id'))->result;
        $chapters = null;

        if (!empty($result)) {
            $chapters = !empty($result->chapters) ? $result->chapters : null;
            $booksModel->readBook(session('user')['id'], (int) $req->params()->get('id'), $chapters[0]->id);

            if (!empty($chapters)) {
                $booksModel->readBookChapter(session('user')['id'], (int) $req->params()->get('id'), $chapters[0]->id);
            }
        }

        $res->extends('layouts/blank');
        $res->render('dashboard/user/read_book', [
            'title' => 'Lecture du livre',
            'active' => 'dashboard',
            'book' => $result,
            'chapters' => $chapters
        ]);
    });

    /**
     * Route de la lecture du chqpitre d4un livre
     */
    $router->get('/books/:id/chapters/:id_chapter', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['auth']($req, $res);

        global $booksModel;
        $result = $booksModel->getBookWithChapters((int) $req->params()->get('id'))->result;
        $chapters = null;

        if (!empty($result)) {
            $chapters = !empty($result->chapters) ? $result->chapters : null;

            $booksModel->readBook(session('user')['id'], (int) $req->params()->get('id'), (int) $req->params()->get('id_chapter'));

            if (!empty($chapters)) {
                $booksModel->readBookChapter(session('user')['id'], (int) $req->params()->get('id'), (int) $req->params()->get('id_chapter'));
            }
        }

        $res->extends('layouts/blank');
        $res->render('dashboard/user/read_book_chapter', [
            'title' => 'Lecture du livre',
            'active' => 'dashboard',
            'book' => $result,
            'chapters' => $chapters,
            'key_active' => 0,
            'chapter_active' => $booksModel->getBookChapterByIdChapter((int) $req->params()->get('id_chapter'))->result
        ]);
    });

    /**
     * Route de souscriptions de l'utilisateur
     */
    $router->get('/subscriptions', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/subscriptions', [
            'title' => 'Mes Abonnements',
            'active' => 'subscriptions'
        ]);
    });

    /**
     * Route de souscriptions
     */
    $router->get('/subscribe', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/subscribe', [
            'title' => "S'abonner",
            'active' => 'subscriptions',
            'back_link' => $req->server()->get('HTTP_REFERER')
        ]);
    });


    /**
     * Reoute de notification de l'user
     */
    $router->get('/notifications', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/notifications', [
            'title' => 'Mes Abonnements',
            'active' => 'notifications'
        ]);
    });

    /**
     * Route de la page profile de l'utilisateur
     */
    $router->get('/profile', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        global $userModel;
        $user = $userModel->findOneById(session('user')['id']);
        $countries = $userModel->findActives([], 'countries');

        // debug($countries);

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/profile', [
            'title' => "Profile",
            'active' => 'profile',
            'user' => $user,
            'countries' => $countries
        ]);
    });

    /**
     * Route de la page profile des books d'une catégorie
     */
    $router->get('/categories/:id', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);
        
        global $booksModel;

        $result = $booksModel->getBooksByCategory((int) $req->params()->get('id'))->result;

        $res->extends('layouts/dashboard_user');
        $res->render('dashboard/user/categories', [
            'title' => !empty($result) ? $result->intituled : "Livres par catégorie",
            'active' => 'dashboard',
            'category' => $result
        ]);
    });
    
    return $router;