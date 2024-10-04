<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<h1 id="titreMenu">Création Client</h1>

<form method="post" action="<?= url_to('creation-client_post') ?>">
    <label> RAISON_SOCIALE </label> <br>
    <input type="text" id="RAISON_SOCIALE" name="RAISON_SOCIALE" require><br><br>
    <label> nom </label> <br>
    <input type="text" id="NOM" name="NOM" require><br><br>
    <label for="text">prénom</label> <br>
    <input type="text" id="PRENOM" name="PRENOM" require><br><br>
    <label> EMAIL </label> <br>
    <input type="text" id="EMAIL" name="EMAIL" require><br><br>
    <label> TELEPHONE </label> <br>
    <input type="text" id="TELEPHONE" name="TELEPHONE" require><br><br>
    <label> ADRESSE </label> <br>
    <input type="text" id="ADRESSE" name="ADRESSE" require><br><br>
    <label> CODE_POSTAL </label> <br>
    <input type="text" id="CODE_POSTAL" name="CODE_POSTAL" require><br><br>
    <label> VILLE </label> <br>
    <input type="text" id="VILLE" name="VILLE" require><br><br>
  
    <input type="submit" value="Valider">

</form>

<?= $this->endSection() ?>