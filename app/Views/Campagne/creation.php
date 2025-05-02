<?php $this->setVar('titre', 'Création de Campagne'); ?>
<?= $this->extend('Layout') ?>
<?= $this->section('contenu') ?>

<form method="post" action="<?= url_to('creation_campagne_post') ?>" enctype="multipart/form-data">
    <input type="hidden" id="ID_CLIENT" name="ID_CLIENT" value="<?= $idClient['ID_CLIENT'] ?>" />

    <label class="required" for="TITRE">Titre de la campagne</label>
    <input type="text" id="TITRE" name="TITRE" placeholder="Saisissez le titre de la campagne" required minlength="3"
        maxlength="50" size="50">

    <label class="required" for="LIBELLE">Texte descriptif</label>
    <textarea id="LIBELLE" name="LIBELLE" placeholder="Tapez votre descriptif" minlength="3" maxlength="255"
        required size="255"></textarea>

    <label class="required" for="DATE">Date</label>
    <input type="date" id="DATE" name="DATE" value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>" max="2026-12-31"
        required />

    <label class="required" for="CONTACTS">Contacts</label>
    <p class="file-accept">Veuillez télécharger un fichier au format CSV.</p>
    <label class="custom-file-upload">
        <input type="file" name="CONTACTS" id="CONTACTS" accept=".csv" required>
        Choisir un fichier
    </label>
    <input type="submit" value="Suivant">
</form>

<?= $this->endSection() ?>
