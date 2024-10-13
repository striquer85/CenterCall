<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<h1 id="titreMenu">Gestion Questions</h1>
<div class="campagne-info">
    <p class="campagne-titre"><?= $campagne['TITRE'] ?></p>
    <p class="campagne-date"><?= $campagne['DATE'] ?></p>
    <p class="campagne-libelle"><?= $campagne['LIBELLE'] ?></p>
</div>
<a class="button" href="<?= url_to('creation_question_get', $campagne['ID_CAMPAGNE']) ?>">Nouvelle question</a>


<?php
$table = new \CodeIgniter\View\Table();
$table->setHeading('Question', 'Modifier', 'Supprimer');
foreach ($questions as $question) {
    $table->addRow(
        $question['QUESTION'],
        '<a href="' . url_to('modif_question_get', $question['ID_QUESTION']) . '"><button class="button">Modifier</button></a>',
        '<form class="form-suppression" action="' . url_to('suppr_question') . '" method="post">
            <input type="hidden" name="ID_QUESTION" value="' . $question['ID_QUESTION'] . '">
            <input type="hidden" name="ID_CAMPAGNE" value="' . $question['ID_CAMPAGNE'] . '">
            <button type="submit" class="button">Supprimer</button>
        </form>'
    );
}
echo $table->generate();
?>

<?= $this->endSection() ?>