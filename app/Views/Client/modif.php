<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<div class="titre-container">
    <h1 class="titreMenu">Modification Client</h1>
</div>

<form method="post" action="<?= url_to('modif_client_post') ?>">
    <input type="hidden" id="ID_CLIENT" name="ID_CLIENT" value="<?= $client["ID_CLIENT"] ?>">
    <label class="required"> RAISON_SOCIALE </label>
    <input type="text" id="RAISON_SOCIALE" name="RAISON_SOCIALE" value="<?= $client['RAISON_SOCIALE'] ?>" require>
    <label class="required"> nom </label>
    <input type="text" id="NOM" name="NOM" value="<?= $client['NOM'] ?>" require>
    <label class="required" for="text">prénom</label>
    <input type="text" id="PRENOM" name="PRENOM" value="<?= $client['PRENOM'] ?>" require>
    <label class="required"> EMAIL </label>
    <input type="text" id="EMAIL" name="EMAIL" value="<?= $client['EMAIL'] ?>" require>
    <label class="required"> TELEPHONE </label>
    <input type="text" id="TELEPHONE" name="TELEPHONE" value="<?= $client['TELEPHONE'] ?>" require>
    <label class="required"> ADRESSE </label>
    <input type="text" id="ADRESSE" name="ADRESSE" value="<?= $client['ADRESSE'] ?>" require>
    <label class="required"> CODE_POSTAL </label>
    <input type="text" id="CODE_POSTAL" name="CODE_POSTAL" value="<?= $client['CODE_POSTAL'] ?>" require>
    <label class="required"> VILLE </label>
    <input type="text" id="VILLE" name="VILLE" value="<?= $client['VILLE'] ?>" require>


    <input type="submit" value="Valider">
    <!-- <?php
    echo '<a href="' . url_to('gestion_campagnes', $client['ID_CLIENT']) . '"<button class ="button">voir campagne </button></a>';
    ?> -->
</form>





<?= $this->endSection() ?>