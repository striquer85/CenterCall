<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<h1> Gestion des Questions </h1>
<a class="bouton" href="<?= url_to('creation_question_get',$campagne['ID_CAMPAGNE']) ?>">Nouvelle question</a>
<?= $campagne['TITRE'] ?>
<?= $campagne['DATE'] ?>
<?= $campagne['LIBELLE'] ?>
<?php

$table = new \CodeIgniter\View\Table();
$table->setHeading('Question', 'Modifier', 'Supprimer');
foreach ($listeQuestion as $question) {
    $table->addRow(
        $question['QUESTION'],
        '<a href="' . url_to('modif_question_get', $question['ID_QUESTION'], $question['ID_CAMPAGNE']) . '"<button class ="button">Modifier</button></a>',
        '<a href="' . url_to('suppr_question', $question['ID_QUESTION']) . '"<button class ="button">suprimer</button></a>'
    );
    echo $table->generate();
}
?>

<?= $this->endSection() ?>