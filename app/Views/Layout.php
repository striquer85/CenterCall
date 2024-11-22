<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= isset($titre) ? $titre : 'CenterCall' ?></title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/main.css') ?>">
</head>

<style>

</style>

<body>
    <div class="titre-container">
        <div class="card-body">
            <h5 class="titre-menu"><?= isset($titre) ? $titre : 'CenterCall' ?></h5>
            <a class="button button-logout" href="<?= url_to('logout') ?>">Déconnexion</a>
        </div>
    </div>
    <div class="content">
        <?= $this->renderSection('contenu') ?>
    </div>
    <footer>
        <div class="footer-content">
            <p>&copy; <?= date('Y') ?> CenterCall V2. Tous droits réservés.</p>
        </div>
    </footer>
</body>

</html>