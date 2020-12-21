<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>
        <?= !empty($title) ? $title : config('app.name') ?>
    </title>

    <!-- Rale Font + Work Sans Font -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600,700,800|Work+Sans:300,400,500,600,700"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/public/home/css/bootstrap.min.css">

    <!-- Linea Icons -->
    <link rel="stylesheet" href="/public/home/css/linea-basic-icons.css">
    <link rel="stylesheet" href="/public/home/css/linea-ecommerce-icons.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
        integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

    <link rel="stylesheet" href="/public/home/css/ripple.min.css">

    <link rel="stylesheet" href="/public/home/css/styles.css">

    <link rel="apple-touch-icon" sizes="76x76" href="/public/img/logos/logo-congo-book.png">
    <link rel="icon" type="image/png" href="/public/img/logos/logo-congo-book.png">

</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top alt animated navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="/public/img/logos/logo-congo-book.png" alt="Logo de <?= config('app.name') ?>" width="40px" />
                <?= config('app.name') ?>
            </a>

            <button class="navbar-toggler material-ripple" type="button" data-toggle="collapse"
                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="icon-bar i1"></span>
                <span class="icon-bar i2"></span>
                <span class="icon-bar i3"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Accueil <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-4" href="#overview">Livres</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-4" href="#author">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary mr-3" href="/register">Créer un compte <i class="fa fa-pencil-alt"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="/login">Connexion <i class="fa fa-sign-in-alt"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Start Header/Hero Section -->
    <header id="home">
        <div class="hero-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="hero-text">
                            <h1><?= config('app.name') ?></h1>
                            <p><?= config('app.description') ?></p>
                            <a href="/register" class="btn btn-light btn-lg t-cap mt-3 material-ripple">Créer un compte</a>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div>
                            <img src="/public/home/assets/book-mockup.png" alt="Ebook" class="img-fluid book-mockup">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header/Hero Section -->

    <!-- Start Statics Section -->
    <section class="statics">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="stats-list">
                        <div class="stats-list-icon">
                            <i class="icon icon-basic-spread-text"></i>
                        </div>
                        <div class="stats-list-text wow fadeInUp" data-wow-delay=".1s">
                            <h2><?= $count_books ?></h2>
                            <h3>Livres publiés</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="stats-list">
                        <div class="stats-list-icon">
                            <i class="icon fa fa-users"></i>
                        </div>
                        <div class="stats-list-text">
                            <h2><?= $count_users ?></h2>
                            <h3>Utilisateurs</h3>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="stats-list">
                        <div class="stats-list-icon">
                            <i class="icon fa fa-list"></i>
                        </div>
                        <div class="stats-list-text">
                            <h2><?= $count_categories ?></h2>
                            <h3>Catégories</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Statics Section -->

    <!-- Start Overview Section (Chapters list, video preview, app compatibility sections) -->
    <section id="overview">
        <!-- Start Chapters List -->
        <div class="container">
            <div class="section-title">
                <h2>Nouveautés</h2>
                <p>Découvrez de nouveaux livres publiés</p>
                <hr class="left"><i class="icon icon-basic-spread-text"></i>
                <hr class="right">
            </div>
            <div class="row">
                <?php if (!empty($new_books)) : ?>
                    <?php foreach ($new_books as $book) : ?>
                        <div class="col-lg-4">
                            <div class="chapters-list">
                                <div class="chapter-list-icon">
                                    <!-- <i class="icon icon-basic-anchor"></i> -->
                                    <img src="/<?= !empty($book->cover) ? $book->cover : 'public/img/books/semaine-4-heures.jpg' ?>" alt="" class="icon" style="width: 50px;">
                                </div>
                                <div class="chapter-list-text">
                                    <h5><?= sub_string(ucfirst($book->title), 20) ?></h5>
                                    <p><strong>Auteur</strong> : <?= sub_string(ucfirst($book->other), 20) ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </div>
        <!-- End Chapters List -->

        <!-- Start Video Preview -->
        <div class="video-review">
            <div class="container">
                <div class="section-title">
                    <h2>Video D'Apperçu</h2>
                    <p>Une vidéo qui explique tout</p>
                    <hr class="left"><i class="icon icon-basic-spread-text"></i>
                    <hr class="right">
                </div>
                <div class="row">
                    <div class="col-lg-8 col-md-12 offset-lg-2 offset-md-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="https://player.vimeo.com/video/172077385" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Video Preview -->

        <!-- Start App Compatibility -->
        <div class="read-in-all">
            <div class="container">
                <div class="section-title">
                    <h2>Futures</h2>
                    <p>Arrive bientôt...</p>
                    <hr class="left"><i class="icon icon-basic-spread-text"></i>
                    <hr class="right">
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <img src="/public/home/assets/devices-mockup.png" alt="mobile tablet devices"
                            class="img-fluid wow fadeInLeft">
                    </div>
                    <div class="col-lg-6">
                        <div class="compatibility-text">
                            <h2>Application Mobile</h2>
                            
                            <p>Bientôt vous pourriez télécharger directement votre application mobile sur toutes vos plateformes, vous donnant la possibilité de lire vos livres en temps réel.</p>

                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint quo magni autem quia eum a veniam consequatur labore ex! Magnam animi asperiores nihil eligendi modi repudiandae, quasi sint dolor dolore?</p>

                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores ratione earum temporibus similique in fugiat reiciendis labore culpa! Facere sed labore doloribus magnam soluta ea qui tempore inventore quasi nulla?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End App Compatibility -->
    </section>
    <!-- End Overview Section -->

    <!-- Start Feedback/Reviews Section -->
    <section id="feedback">
        <div class="container">
            <div class="section-title">
                <h2>Quelques Témoignages</h2>
                <p>Certains utilisateurs ont parlés de nous</p>
                <hr class="left"><i class="icon icon-basic-spread-text"></i>
                <hr class="right">
            </div>
            <div class="reviews-lists">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="review-list">
                            <img src="https://scontent.ffih1-2.fna.fbcdn.net/v/t1.0-9/123138890_220667616148471_4116174576955064713_o.jpg?_nc_cat=108&ccb=2&_nc_sid=09cbfe&_nc_eui2=AeH6DKQ6d5e-_O7a8UTmFj_Ua1qKiNQVSAlrWoqI1BVICU0cHsDEzs4uTdlYrsha3KN9GbZQu4cdYSjIrbMOwbM7&_nc_ohc=vHYAGPRISk0AX9XAP_r&_nc_ht=scontent.ffih1-2.fna&oh=4d34f47d49c6a7518d90e8c9345088bd&oe=6003C4A6" alt="" width="50px">
                            <h4>Don de Dieu</h4>
                            <p>“Love the content in the book, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa.”</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="review-list">
                            <img src="/public/home/assets/reader-2.jpg" alt="">
                            <h4>Michel Smith</h4>
                            <p>“Perfect explation in every topic, consectetuer adipiscing elit. Aenean commodo ligula
                                eget dolor. Aenean massa.”</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="review-list">
                            <img src="/public/home/assets/reader-3.jpg" alt="">
                            <h4>Root Stark</h4>
                            <p>“Gifted it to my childrens - they love it, consectetuer adipiscing elit. Aenean commodo
                                ligula eget dolor. Aenean massa.”</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Feedback/Reviews Section -->

    <!-- Start About The Author Section -->
    <section id="author">
        <div class="container">
            <div class="section-title">
                <h2>A propos de nous</h2>
                <p>Un petit apperçu sur <strong><?= config('app.name') ?></strong></p>
                <hr class="left"><i class="icon icon-basic-spread-text"></i>
                <hr class="right">
            </div>
            <div class="row">
                <div class="col-lg-5 author-details">
                    <img src="/public/img/logos/logo-congo-book.png" class="author-picture img-fluid" alt="">
                    <div class="author-name">
                        <h4>Siuvez-nous sur : </h4>
                        <div class="author-social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h4>Qui sommes-nous ?</h4>
                    <p><strong><?= config('app.name') ?></strong> est une bibliothèque numérique qui permet à tout le monde de lire et de publier de livres dans tous les domaines.</p>

                    <p>Après que vous ayez souscrit à un abonnement, ceci vous permet d'avoir accès aux livres offerts par cette souscription.</p>
                    <br>

                    <h4>Que faisons-nous ?</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus iusto, optio pariatur
                        obcaecati maxime possimus dolorum cum. Illum pariatur sunt numquam, voluptatum, odit dicta,
                        porro enim, aspernatur molestias iure nemo!</p>
                    <img src="/public/home/assets/signature.png" alt="Author Signature" class="autor-signature">
                </div>
            </div>
        </div>
    </section>
    <!-- End About The Author Section -->

    <!-- Start Pricing Tables Section -->
    <section id="pricing">
        <div class="container">
            <div class="section-title light">
                <h2>Nos Abonnements</h2>
                <p>Souscrivez et ayez accès aux livres de votre choix</p>
                <hr class="left"><i class="icon icon-basic-spread-text"></i>
                <hr class="right">
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="pricing-table">
                        <h4>Premium Solo</h4>
                        <h3 class="price">3 $ Pour 3 mois</h3>
                        <ul>
                            <li>Accès à 25 Livres</li>
                            <li>Téléchargement Livres gratuits en PDF</li>
                            <li>Ecouter Livres Audios Gratuits</li>
                        </ul>
                        <a href="#" class="btn btn-secondary btn-lg material-ripple">Souscrire</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-table popular">
                        <h4>Premium Médium</h4>
                        <h2 class="price">5 $ Pour 6 Mois</h2>
                        <ul>
                            <li>Accès à 55 Livres</li>
                            <li>Téléchargement Livres gratuits en PDF</li>
                            <li>Ecouter Livres Audios Gratuits</li>
                            <li>Débloquage de 20 Livres à lire pendant 2 mois après expiration de l'abonnement</li>
                        </ul>
                        <a href="#" class="btn btn-primary btn-lg material-ripple">Souscrire</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-table">
                        <h4>Premium Plus</h4>
                        <h2 class="price">15 $ Pour 12 Mois</h2>
                        <ul>
                            <li>Accès à Tous Nos Livres</li>
                            <li>Téléchargement Livres gratuits en PDF</li>
                            <li>Ecouter Livres Audios Gratuits</li>
                            <li>Débloquage de 30 Livres à lire pendant 3 mois après expiration de l'abonnement</li>
                            <li>Avoir Contact à un mentor Pour Rédaction de votre livre</li>
                        </ul>
                        <a href="#" class="btn btn-secondary btn-lg material-ripple">Souscrire</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Pricing Tables Section -->

    <section id="contact">
        <div class="container">
            <div class="section-title">
                <h2>LAISSEZ-NOUS UN MESSAGE</h2>
                <p>Avez-vous une question, une requête ? N'hésitez pas de la soumettre.</p>
                <hr class="left"><i class="icon icon-basic-spread-text"></i>
                <hr class="right">
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 offset-lg-3 offset-md-0">
                    <form id="contact-form" method="POST">
                        <div class="form-group">
                            <label for="fullName" class="sr-only">Votre nom complet</label>
                            <input type="text" class="form-control form-control-lg" name="fullName" id="fullName"
                                placeholder="Votre nom complet" required="required">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Votre Email</label>
                            <input type="email" class="form-control form-control-lg" name="email" id="email"
                                placeholder="Votre Email" required="required">
                        </div>
                        <div class="form-group">
                            <label for="phoneNo" class="sr-only">Numero Téléphone</label>
                            <input type="text" class="form-control form-control-lg" name="phoneNo" id="phoneNo"
                                placeholder="Numero Téléphone" required="required">
                        </div>
                        <div class="form-group">
                            <label for="message" class="sr-only">Votre message</label>
                            <textarea class="form-control form-control-lg" name="message" id="message" rows="4"
                                placeholder="Votre message" required="required"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary material-ripple">Envoyer</button>
                        <div class="form-message"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <p class="copy-line">© <?= date('Y') ?> - <?= config('app.name') ?> - Tous droits reservés.</p>
                </div>
                <div class="col-lg-6">
                    <div class="footer-social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <!-- WOW js CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

    <script src="/public/home/js/jquery.scrollTo.min.js"></script>
    <script src="/public/home/js/jquery.easing.1.3.js"></script>

    <script src="/public/home/js/ripple.min.js"></script>

    <script src="/public/home/js/bootstrapValidator.min.js"></script>

    <script src="/public/home/js/custom-script.js"></script>

</body>

</html>