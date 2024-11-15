<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?= $this->renderSection('title') ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/main.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <?= $this->renderSection('pageStyles') ?>
</head>

<body class="bg-light">

    <main role="main" class="content">
        <?= $this->renderSection('main') ?>
    </main>

<?= $this->renderSection('pageScripts') ?>
<footer>
        <div class="footer-content">
            <p>&copy; <?= date('Y') ?> CenterCall. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>
