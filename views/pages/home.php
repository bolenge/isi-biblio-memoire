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

    <link rel="icon" href="/public/home/assets/fevicon.png" type="image/gif">

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
                        <a class="nav-link active" href="#home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#overview">Overview</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#feedback">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#author">Author</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Price</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
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
                <h2>Overview</h2>
                <p>List of chapters included in the ebook</p>
                <hr class="left"><i class="icon icon-basic-spread-text"></i>
                <hr class="right">
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="chapters-list">
                        <div class="chapter-list-icon">
                            <i class="icon icon-basic-anchor"></i>
                        </div>
                        <div class="chapter-list-text">
                            <h4>Chapter 1</h4>
                            <p>About the author and book designer, consectetuer adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chapters-list">
                        <div class="chapter-list-icon">
                            <i class="icon icon-basic-sheet-pencil"></i>
                        </div>
                        <div class="chapter-list-text">
                            <h4>Chapter 2</h4>
                            <p>Sell best ebooks for everyone, consectetuer adipiscing elit. Aenean commodo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chapters-list">
                        <div class="chapter-list-icon">
                            <i class="icon icon-basic-pencil-ruler"></i>
                        </div>
                        <div class="chapter-list-text">
                            <h4>Chapter 3</h4>
                            <p>How to draw perfect shapes, consectetuer adipiscing elit. Aenean commodo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chapters-list">
                        <div class="chapter-list-icon">
                            <i class="icon icon-basic-pencil-ruler-pen"></i>
                        </div>
                        <div class="chapter-list-text">
                            <h4>Chapter 4</h4>
                            <p>Required tools for artists, consectetuer adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chapters-list">
                        <div class="chapter-list-icon">
                            <i class="icon icon-basic-picture-multiple"></i>
                        </div>
                        <div class="chapter-list-text">
                            <h4>Chapter 5</h4>
                            <p>Best ways to get good photos, adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="chapters-list">
                        <div class="chapter-list-icon">
                            <i class="icon icon-basic-cup"></i>
                        </div>
                        <div class="chapter-list-text">
                            <h4>Chapter 6</h4>
                            <p>How to win everything, consectetuer adipiscing elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Chapters List -->

        <!-- Start Video Preview -->
        <div class="video-review">
            <div class="container">
                <div class="section-title">
                    <h2>Video Overview</h2>
                    <p>List of chapters included in the ebook</p>
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
                    <h2>Read it in All Devices</h2>
                    <p>List of chapters included in the ebook</p>
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
                            <h2>Browse Anywhere Any Device</h2>
                            <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat
                                massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                                sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec,
                                vulputate eget, arcu.</p>
                            <a href="#" class="btn btn-lg btn-primary material-ripple">Buy Now</a>
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
                <h2>What Readers Say</h2>
                <p>List of chapters included in the ebook</p>
                <hr class="left"><i class="icon icon-basic-spread-text"></i>
                <hr class="right">
            </div>
            <div class="reviews-lists">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="review-list">
                            <img src="/public/home/assets/reader-1.jpg" alt="">
                            <h4>Jhon Doe</h4>
                            <h5>Designer</h5>
                            <p>“Love the content in the book, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa.”</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="review-list">
                            <img src="/public/home/assets/reader-2.jpg" alt="">
                            <h4>Michel Smith</h4>
                            <h5>Developer</h5>
                            <p>“Perfect explation in every topic, consectetuer adipiscing elit. Aenean commodo ligula
                                eget dolor. Aenean massa.”</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="review-list">
                            <img src="/public/home/assets/reader-3.jpg" alt="">
                            <h4>Root Stark</h4>
                            <h5>Designer</h5>
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
                <h2>About The Author</h2>
                <p>List of chapters included in the ebook</p>
                <hr class="left"><i class="icon icon-basic-spread-text"></i>
                <hr class="right">
            </div>
            <div class="row">
                <div class="col-lg-5 author-details">
                    <img src="/public/home/assets/Author.jpg" class="author-picture img-fluid" alt="">
                    <div class="author-name">
                        <h4>J.R.R. Tolkien</h4>
                        <div class="author-social-icons">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-behance"></i></a>
                            <a href="#"><i class="fab fa-dribbble"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <h4>A Note From the Author</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus iusto, optio pariatur
                        obcaecati maxime possimus dolorum cum. Illum pariatur sunt numquam, voluptatum, odit dicta,
                        porro enim, aspernatur molestias iure nemo!
                        Porem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus iusto, optio pariatur
                        obcaecati maxime possimus dolorum cum.</p>
                    <br>
                    <h4>Author Career Biography</h4>
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
                <h2>Pricing Plans</h2>
                <p>List of chapters included in the ebook</p>
                <hr class="left"><i class="icon icon-basic-spread-text"></i>
                <hr class="right">
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="pricing-table">
                        <h4>BASIC E-BOOK</h4>
                        <h2 class="price"><sup>$</sup>89.00</h2>
                        <ul>
                            <li>Printable Color PDF Book</li>
                            <li>Our Online Library Access</li>
                            <li>Bonus Ebooks Included</li>
                        </ul>
                        <a href="#" class="btn btn-dark btn-lg material-ripple">Purchase Now</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-table popular">
                        <h4>ADVANCED E-BOOK</h4>
                        <h2 class="price"><sup>$</sup>149.00</h2>
                        <ul>
                            <li>With Basic Package</li>
                            <li>Hard Copy of the Book</li>
                            <li>Author Autograph</li>
                            <li>Gift From the Author</li>
                        </ul>
                        <a href="#" class="btn btn-primary btn-lg material-ripple">Purchase Now</a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-table">
                        <h4>ULTIMATE E-BOOK</h4>
                        <h2 class="price"><sup>$</sup>199.00</h2>
                        <ul>
                            <li>With Advanced Package</li>
                            <li>Limited Edition Book</li>
                            <li>Collector Edition Book</li>
                            <li>Personalised Pen</li>
                            <li>Hand Crafted Sketch Book</li>
                        </ul>
                        <a href="#" class="btn btn-dark btn-lg material-ripple">Purchase Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Pricing Tables Section -->

    <!-- Start Recent Blog Posts Section -->
    <section id="blog">
        <div class="container">
            <div class="section-title">
                <h2>Latest News</h2>
                <p>List of chapters included in the ebook</p>
                <hr class="left"><i class="icon icon-basic-spread-text"></i>
                <hr class="right">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="blog-post">
                        <div class="post-img">
                            <img src="/public/home/assets/blog1.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="post-content">
                            <h4>Cats Lover Books</h4>
                            <p class="post-date">26 Aug, 2018 | By Author</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa.</p>
                            <a href="#" class="btn post-btn">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="blog-post">
                        <div class="post-img">
                            <img src="/public/home/assets/blog3.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="post-content">
                            <h4>Must Read Digital Books</h4>
                            <p class="post-date">26 Aug, 2018 | By Author</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa.</p>
                            <a href="#" class="btn post-btn">Read More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Recent Blog Posts Section -->

    <!-- Small/Simple Download Banner -->
    <div class="simple-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="sb-title">
                        <h3>“There is no friend as loyal as book”</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="#" class="btn btn-lg btn-light material-ripple">Purchase Now</a>
                </div>
            </div>
        </div>
    </div>

    <section id="contact">
        <div class="container">
            <div class="section-title">
                <h2>DROP A MESSAGE</h2>
                <p>Any Questions ? feel free to drop a message to us</p>
                <hr class="left"><i class="icon icon-basic-spread-text"></i>
                <hr class="right">
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 offset-lg-3 offset-md-0">
                    <form id="contact-form" method="POST">
                        <div class="form-group">
                            <label for="fullName" class="sr-only">Your Full Name</label>
                            <input type="text" class="form-control form-control-lg" name="fullName" id="fullName"
                                placeholder="Your Full Name" required="required">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email ID</label>
                            <input type="email" class="form-control form-control-lg" name="email" id="email"
                                placeholder="Email ID" required="required">
                        </div>
                        <div class="form-group">
                            <label for="phoneNo" class="sr-only">Phone Number</label>
                            <input type="text" class="form-control form-control-lg" name="phoneNo" id="phoneNo"
                                placeholder="Phone Number" required="required">
                        </div>
                        <div class="form-group">
                            <label for="message" class="sr-only">MEssage</label>
                            <textarea class="form-control form-control-lg" name="message" id="message" rows="4"
                                placeholder="Message" required="required"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary material-ripple">Send Message</button>
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
                    <p class="copy-line">© 2019 - All Rights reserved.</p>
                </div>
                <div class="col-lg-6">
                    <div class="footer-social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i
                                class="fab fa-twitter"></i></a><a href="#"><i class="fab fa-behance"></i></a><a
                            href="#"><i class="fab fa-dribbble"></i></a><a href="#"><i
                                class="fab fa-pinterest-p"></i></a>
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