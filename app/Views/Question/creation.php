<?php $this->setVar('titre', 'Création Question'); ?>
<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<form method="post" action="<?= url_to('creation_question_post') ?>">
    <label class="required" for="QUESTION">Question</label>
    <textarea class="textarea-question" id="QUESTION" name="QUESTION" required
        placeholder="Posez votre question ici"></textarea>
    <input type="hidden" id="ID_CAMPAGNE" name="ID_CAMPAGNE" value="<?= $idCampagne['ID_CAMPAGNE'] ?>">

    <input type="submit" value="Suivant">
</form>
<div class="button-container">
    <a href="<?= url_to('gestion_question', $idCampagne['ID_CAMPAGNE']) ?>"><button
            class="button button-terminer">Terminer</button></a>
</div>
<?= $this->endSection() ?>