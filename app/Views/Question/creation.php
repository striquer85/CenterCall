<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<h1 id="titreMenu">Création Question</h1>
<form method="post" action="<?= url_to('creation_question_post') ?>">
    <label for="QUESTION">Question</label> <br>
    <input type="text" id="QUESTION" name="QUESTION" required><br><br>
    <input type="hidden" id="ID_CAMPAGNE" name="ID_CAMPAGNE" value="<?= $idCampagne['ID_CAMPAGNE'] ?>"><br><br>

    <input type="submit" value="Valider et passer a la question suivante">
</form>
<a href="<?= url_to('gestion_question', $idCampagne['ID_CAMPAGNE']) ?>"><button class="button">Terminer</button></a>
<?= $this->endSection() ?>