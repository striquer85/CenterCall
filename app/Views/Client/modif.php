<?= $this->extend('Layout')?>
<?= $this->section('contenu')?>
<h1 id="titreMenu">Modification Client</h1>

<form method="post" action="<?= url_to('modif_client_post') ?>">
    <input type="hidden" id="ID_CLIENT" name="ID_CLIENT" value="<?= $client["ID_CLIENT"] ?>">
    <label> RAISON_SOCIALE </label> <br>
    <input type="text" id="RAISON_SOCIALE" name="RAISON_SOCIALE" value="<?=$client['RAISON_SOCIALE'] ?>" require><br><br>
    <label> nom </label> <br>
    <input type="text" id="NOM" name="NOM" value="<?=$client['NOM'] ?>" require><br><br>
    <label for="text">prénom</label> <br>
    <input type="text" id="PRENOM" name="PRENOM" value="<?=$client['PRENOM'] ?>" require><br><br>
    <label> EMAIL </label> <br>
    <input type="text" id="EMAIL" name="EMAIL" value="<?=$client['EMAIL'] ?>" require><br><br>
    <label> TELEPHONE </label> <br>
    <input type="text" id="TELEPHONE" name="TELEPHONE" value="<?=$client['TELEPHONE'] ?>" require><br><br>
    <label> ADRESSE </label> <br>
    <input type="text" id="ADRESSE" name="ADRESSE"value="<?=$client['ADRESSE'] ?>" require><br><br>
    <label> CODE_POSTAL </label> <br>
    <input type="text" id="CODE_POSTAL" name="CODE_POSTAL"  value="<?=$client['CODE_POSTAL'] ?>"require><br><br>
    <label> VILLE </label> <br>
    <input type="text" id="VILLE" name="VILLE" value="<?=$client['VILLE'] ?>" require><br><br>

  
    <input type="submit" value="Valider">
 <!-- <?php  
    echo '<a href="' . url_to('gestion_campagnes', $client['ID_CLIENT']) . '"<button class ="button">voir campagne </button></a>';
    ?> -->
</form>





<?= $this->endSection()?>