<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<div class="titre-container">
    <h1 class="titreMenu">Gestion Campagnes</h1>
</div>
<div class="button-container">
    <a class="button button-ajout" href="<?= url_to('creation_campagne_get', $client['ID_CLIENT']) ?>">Nouvelle
        Campagne</a>
</div>
<?php
$table = new \CodeIgniter\View\Table();
$table->setHeading(['Titre Campagne', 'Voir Campagne', 'Modifier']);

foreach ($listeCampagnes as $campagne) {

    $table->addRow(
        $campagne['TITRE'],
        '<a><button class="button button-voir-campagne">Voir</button></a>',
        '<a href="' . url_to('modif_campagne_get', $campagne['ID_CAMPAGNE']) . '"><button class="button button-modifier">Modifier</button></a>'
    );
}
echo '<div class="table-container">';
echo $table->generate();
echo '</div>';
?>
<?= $this->endSection() ?>