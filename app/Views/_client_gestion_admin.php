<?= $this->extend('Layout') ?>
<?= $this->section('contenu') ?>
<h1> Gestion des étudiants </h1>
<?php
$table = new \CodeIgniter\View\Table();
echo '<a href="' . url_to('creation-client_get') . '" <button class="button">Nouveaux Client</button></a>';
$table->setHeading('RAISON_SOCIALE', 'NOM', 'PRENOM', 'EMAIL', 'TELEPHONE', 'ADRESSE', 'CODE_POSTAL', 'VILLE', 'Modifier', 'Suprimer');


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
        // '<a href="' . url_to('modif_client', $client['ID_CLIENT']) . '"<button class ="button">Modifier</button></a>',
        // '<a href="' . url_to('delete_client', $client['id']) . '"<button class ="button">suprimer</button></a>'

    );
}

echo $table->generate();

?>


<?= $this->endSection() ?>