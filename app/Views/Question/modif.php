<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>*
<div class="titre-container">
    <h1 class="titreMenu">Modification Question</h1>
</div>
<form method="post" action="<?= url_to('modif_question_post') ?>">
    <label class="required">Question</label>
    <input type="text" id="QUESTION" name="QUESTION" value="<?= $question['QUESTION'] ?>" required>
    <input type="hidden" id="ID_CAMPAGNE" name="ID_CAMPAGNE" value="<?= $question['ID_CAMPAGNE'] ?>">
    <input type="hidden" id="ID_QUESTION" name="ID_QUESTION" value="<?= $question['ID_QUESTION'] ?>">
    <input type="submit" value="Valider">

</form>

<?= $this->endSection() ?>