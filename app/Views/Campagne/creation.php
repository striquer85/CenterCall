<?= $this->extend('Layout') ?>
<?= $this->section('contenu') ?>





<form method="post" action="<?= url_to('creation_campagne_post') ?>">
    <h2>Création de la campagne</h2>

    <label for="name">Titre de la campagne :</label>

    <input type="text" id="TITRE" name="TITRE" required
        minlength="3" maxlength="25" size="18">


    <label for="uname">Texte descriptif :</label>
    <input type="text" id="LIBELLE" name="LIBELLE" placeholder="Tapez votre descriptif : "
        minlength="3" maxlength="100" size="18">

    <label for="start">Date :</label>

    <input type="date" id="DATE" name="DATE" value="0000-00-00" min="2024-01-01" max="2026-12-31" />
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="monFichier">
    <input type="submit" value="Valider">
</form>




<?= $this->endSection() ?>