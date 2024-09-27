<?= $this->extend('Layout')?>
<?= $this->section('contenu')?>

<?php
$table = new \CodeIgniter\View\Table();
$table->setHeading('RAISON_SOCIALE', 'nom','PRENOM', '', 'suprimer');


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
    //  echo $etudiant['nom'] . "\n" . $etudiant['prenom'] . "\n" . "<br> <br>";
}

 echo $table->generate();

?>


<?= $this->endSection()?>