<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<div class="titre-container">
    <h1 class="titreMenu">Création Question</h1>
</div>
<form method="post" action="<?= url_to('creation_question_post') ?>">
    <label class="required" for="QUESTION">Question</label>
    <input type="text" id="QUESTION" name="QUESTION" placeholder="Posez votre question ici" required>
    <input type="hidden" id="ID_CAMPAGNE" name="ID_CAMPAGNE" value="<?= $idCampagne['ID_CAMPAGNE'] ?>">

    <input type="submit" value="Suivant">
</form>
<div class="button-container">
    <a href="<?= url_to('gestion_question', $idCampagne['ID_CAMPAGNE']) ?>"><button
            class="button button-terminer">Terminer</button></a>
</div>
<?= $this->endSection() ?>