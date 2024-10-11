<?= $this->extend('Layout') ?>
<?= $this->section('contenu') ?>
<h1 id="titreMenu">Gestion Campagnes</h1>
<br>
<br>
<a href="<?= url_to('creation_campagne_get', $client['ID_CLIENT']) ?>"><button class="button" type="button">Nouvelle Campagne</button></a>
<br>
<br>

<?php

use Config\View;

$table = new \CodeIgniter\View\Table();

// tableau des campagnes 

$table->setHeading(['Titre_Campagne', 'Voir_Campagne', 'Modifier']);

foreach ($listeCampagnes as $campagne) {

    $table->addRow(
        $campagne['TITRE'],
        '<a><button class="button">Voir</button></a>',
        '<a><button class="button">Modifier</button></a>'

    );
}
echo $table->generate();
?>


<?= $this->endSection() ?>