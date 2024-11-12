<?php $this->setVar('titre', 'Modification Question'); ?>
<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<form method="post" action="<?= url_to('modif_question_post') ?>">
    <label class="required">Question</label>
    <textarea class="textarea-question" id="QUESTION" name="QUESTION" required><?= $question['QUESTION'] ?></textarea>
    <input type="hidden" id="ID_CAMPAGNE" name="ID_CAMPAGNE" value="<?= $question['ID_CAMPAGNE'] ?>">
    <input type="hidden" id="ID_QUESTION" name="ID_QUESTION" value="<?= $question['ID_QUESTION'] ?>">
    <input type="submit" value="Valider">

</form>

<?= $this->endSection() ?>