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

    $router->get('/', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['auth']($req, $res);

        $res->redirect('/dashboard');
    });

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

    $router->get('/register', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['gess']($req, $res);

        $res->extends('layouts/signin');
        $res->render('pages/register', [
            'title' => "Création de compte"
        ]);
    });

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
        $result = $booksModel->getBookWithChapters((int) $req->params()->get('id'))->result;
        $chapters = null;

        if (!empty($result)) {
            $chapters = !empty($result->chapters) ? $result->chapters : null;
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
     * Route de la lecture d'un livre
     */
    $router->get('/books/:id/chapters/:id_chapter', function (Request $req, Response $res) {
        global $userMiddleware;
        $userMiddleware['auth']($req, $res);

        global $booksModel;
        $result = $booksModel->getBookWithChapters((int) $req->params()->get('id'))->result;
        $chapters = null;

        if (!empty($result)) {
            $chapters = !empty($result->chapters) ? $result->chapters : null;
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