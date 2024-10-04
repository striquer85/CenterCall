<?= $this->extend('Layout')?>
<?= $this->section('contenu')?>
<h1> Gestion des étudiants </h1>
<?php
$table = new \CodeIgniter\View\Table();
$table->setHeading('RAISON_SOCIALE', 'NOM','PRENOM', 'EMAIL', 'TELEPHONE','ADRESSE','CODE_POSTAL','VILLE');


foreach ($listeClients as $client) {

    $table->addRow(
        $client['RAISON_SOCIALE'],
        $client['NOM'],
        $client['PRENOM'],
        $client['EMAIL'],
        $client['TELEPHONE'],
        $client['ADRESSE'],
        $client['CODE_POSTAL'],
        $client['VILLE'],

    );
 
}

 echo $table->generate();

?>


<?= $this->endSection()?>