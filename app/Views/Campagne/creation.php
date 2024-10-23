<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<div class="titre-container">
    <h1 class="titreMenu">Création de Campagne</h1>
</div>

<form method="post" action="<?= url_to('creation_campagne_post') ?>" enctype="multipart/form-data">
    <input type="hidden" id="ID_CLIENT" name="ID_CLIENT" value="<?= $idClient['ID_CLIENT'] ?>" />

    <label class="required" for="TITRE">Titre de la campagne</label>
    <input type="text" id="TITRE" name="TITRE" placeholder="Saisissez le titre de la campagne" required minlength="3"
        maxlength="25" size="18">

    <label class="required" for="LIBELLE">Texte descriptif</label>
    <input type="text" id="LIBELLE" name="LIBELLE" placeholder="Tapez votre descriptif" minlength="3" maxlength="100"
        size="18" required>

    <label class="required" for="DATE">Date</label>
    <input type="date" id="DATE" name="DATE" value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>" max="2026-12-31"
        required />

    <label class="required" for="CONTACTS">Contacts</label>
    <label class="custom-file-upload">
        <input type="file" name="CONTACTS" id="CONTACTS" required>
        Choisir un fichier
    </label>

    <input type="submit" value="Valider">
</form>

<?= $this->endSection() ?>