<?= $this->extend('Layout') ?>
<?= $this->section('contenu') ?>
<h1 id="titreMenu">Modification Question</h1>
<form method="post" action="<?= url_to('modif_question_post') ?>">
    <label> Question : </label> <br>
    <input type="text" id="QUESTION" name="QUESTION" value="<?= $question['QUESTION'] ?>" required><br><br>
    <input type="hidden" id="ID_CAMPAGNE" name="ID_CAMPAGNE" value="<?= $question['ID_CAMPAGNE'] ?>"><br><br>
    <input type="hidden" id="ID_QUESTION" name="ID_QUESTION" value="<?= $question['ID_QUESTION'] ?>"><br><br>
    <input type="submit" value="Valider">

</form>

<?= $this->endSection() ?>