<?= $this->extend('Layout') ?>
<?= $this->section('contenu') ?>
<h1 id="titreMenu">Modification Campagne</h1>


<form method="post" action="<?= url_to('modif_campagne_post') ?>" enctype="multipart/form-data">
    <h2>Modification de la campagne</h2>


    <input type="hidden" id="ID_CAMPAGNE" name="ID_CAMPAGNE" value="<?= $campagne['ID_CAMPAGNE'] ?>" />
    <input type="hidden" id="ID_CLIENT" name="ID_CLIENT" value="<?= $campagne['ID_CLIENT'] ?>" />

    <label for="name">Titre de la campagne :</label>

    <input type="text" id="TITRE" name="TITRE" required value="<?= $campagne['TITRE'] ?>" minlength="3" maxlength="25"
        size="18">


    <label for="uname">Texte descriptif :</label>
    <input type="text" id="LIBELLE" name="LIBELLE" placeholder="Tapez votre descriptif : "
        value="<?= $campagne['LIBELLE'] ?>" minlength="3" maxlength="100" size="18">

    <label for="start">Date :</label>

    <input type="date" id="DATE" name="DATE" value="<?= $campagne['DATE'] ?>" min="<?= date('Y-m-d') ?>"
        max="2026-12-31" />

    <label for="CONTACTS">Contacts</label>
    <input type="file" name="CONTACTS" id="CONTACTS">

    <input type="submit" value="Valider">
</form>

<?= $this->endSection() ?>