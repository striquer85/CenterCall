<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<h1> Gestion des Questions </h1>
<?php

$table = new \CodeIgniter\View\Table();
$table->setHeading('Question','Modifier', 'Supprimer');
foreach ($listeQuestion as $question) {
    $table->addRow(
        $question['QUESTION'],
        '<a class="bouton" href="#">Modifier</a>',
        '<a class="bouton" href="#">Supprimer</a>'
    );
    echo $table->generate();
}
?>

<?= $this->endSection() ?>