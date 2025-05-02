
<?= $this->extend('Layout') ?>
<?= $this->section('contenu') ?>
<?php $this->setVar('titre', 'Gestion Clients'); ?>
<div class="button-container">
    <a class="button button-ajout" href="<?= url_to('creation-client_get') ?>">Nouveau Client</a>
</div>
<?php
$table = new \CodeIgniter\View\Table();
$table->setHeading('Raison Sociale', 'Nom', 'Prénom', 'Email', 'Téléphone', 'Adresse', 'Code Postal', 'Ville', 'Modifier', 'Supprimer', 'Voir Campagne');

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
        '<a href="' . url_to('modif_client_get', $client['ID_CLIENT']) . '"><button class="button button-modifier">Modifier</button></a>',
        '<form class="form-suppression" action="' . url_to('suppr_client', $client['ID_CLIENT']) . '" method="post">
            <input type="hidden" name="ID_QUESTION" value="' . $client['ID_CLIENT'] . '">        
        <button type="submit" class="button button-supprimer" 
        onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer ce client et son compte ainsi que toutes les campagnes et questions associées ?\');">Supprimer</button>        
        </form>',
        '<a href="' . url_to('gestion_campagnes', $client['ID_CLIENT']) . '"><button class="button button-voir-campagne">Voir</button></a>'
    );

}
echo '<div class="client-table-container">';
echo $table->generate();
echo '</div>';
?>


<?= $this->endSection() ?>
