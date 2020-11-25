<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <!-- CSS Files -->
        <link href="/public/css/bootstrap.min.css" rel="stylesheet" />
        <link href="/public/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
        <!-- CSS Just for demo purpose, don't include it in your project -->
        <link href="/public/demo/demo.css" rel="stylesheet" />
    </head>
    <body>
        <h3>Bienvenue sur <?= config('app.name') ?></h3>

        <p>Merci de vous avoir inscrit dans notre plateforme, veuillez cliquer sur le lien ci-dessous pour activer votre compte : </p>

        <p><a href="<?= config('app.website_url') ?>/users/activation.php?token=<?= $token ?>"></a>
        </p>
    </body>
</html>