<?= $this->extend('Layout')?>
<?= $this->section('contenu')?>

<?php

use Config\View;

$table = new \CodeIgniter\View\Table();

$table->setHeading('Titre_Campagne','Voir_Campagne','Modifier');

foreach($listeCampagnes as $campagne){

    $table->addRow(
        $campagne['TITRE']
    );
    
}
echo $table->generate();
?>


<?= $this->endSection()?>

