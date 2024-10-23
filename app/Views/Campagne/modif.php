<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<div class="titre-container">
    <h1 class="titreMenu">Modification Campagne</h1>
</div>

<form method="post" action="<?= url_to('modif_campagne_post') ?>" enctype="multipart/form-data">

    <input type="hidden" id="ID_CAMPAGNE" name="ID_CAMPAGNE" value="<?= $campagne['ID_CAMPAGNE'] ?>" />
    <input type="hidden" id="ID_CLIENT" name="ID_CLIENT" value="<?= $campagne['ID_CLIENT'] ?>" />

    <label class="required" for="name">Titre de la campagne</label>

    <input type="text" id="TITRE" name="TITRE" required value="<?= $campagne['TITRE'] ?>" minlength="3" maxlength="25"
        size="18">


    <label class="required" for="uname">Texte descriptif</label>
    <input type="text" id="LIBELLE" name="LIBELLE" placeholder="Tapez votre descriptif : "
        value="<?= $campagne['LIBELLE'] ?>" minlength="3" maxlength="100" size="18">

    <label class="required" for="start">Date</label>

    <input type="date" id="DATE" name="DATE" value="<?= $campagne['DATE'] ?>" min="<?= $campagne['DATE'] ?>"
        max="2026-12-31" />

    <label for="CONTACTS">Contacts</label>
    <label class="custom-file-upload">
        <input type="file" name="CONTACTS" id="CONTACTS">
        Choisir un fichier
    </label>

    <input type="submit" value="Valider">
</form>

<?= $this->endSection() ?>