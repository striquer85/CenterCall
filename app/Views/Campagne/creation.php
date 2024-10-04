<?= $this->extend('Layout') ?>
<?= $this->section('contenu') ?>





<form >
<h2>Création de la campagne</h2>

    <label for="name">Titre de la campagne :</label>

    <input type="text" id="titre" name="titre" required
        minlength="3" maxlength="25" size="18">

        
    <label for="uname">Texte descriptif :</label>
    <input type="text" id="descriptif" name="descriptif" placeholder="Tapez votre descriptif : " 
    minlength="3" maxlength="100" size="18">


</form>

<?= $this->endSection() ?>