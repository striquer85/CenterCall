<?= $this->extend('Layout')?>
<?= $this->section('contenu')?>


<?php 

$table = new \CodeIgniter\View\Table();
$table->setHeading('Titre_Campagne','Voir_Campagne','Modifier');


?>

<?= $this->endSection()?>