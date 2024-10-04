<?= $this->extend('Layout') ?>
<?= $this->section('contenu') ?>

<form method="post" action="<?= url_to('creation_question_post') ?>">
    <label> Question : </label> <br>
    <input type="text" id="QUESTION" name="QUESTION" require><br><br>
    <input type="hidden" id="ID_CAMPAGNE" name="ID_CAMPAGNE" value="<?= $idCampagne['IDCAMPAGNE'] ?>" require><br><br>

    <input type="submit" value="Valider">

</form>
<?= $this->endSection() ?>