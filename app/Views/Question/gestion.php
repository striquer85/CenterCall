<?php $this->setVar('titre', 'Gestion Questions'); ?>
<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<div class="campagne-info">
    <p class="campagne-titre"><?= $campagne['TITRE'] ?></p>
    <p class="campagne-date"><?= $campagne['DATE'] ?></p>
    <p class="campagne-libelle"><?= $campagne['LIBELLE'] ?></p>
</div>
<div class="button-container">
    <a class="button button-ajout" href="<?= url_to('creation_question_get', $campagne['ID_CAMPAGNE']) ?>">Nouvelle
        question</a>
    <a class="button button-ajout" href="<?= url_to('gestion_campagnes', $campagne['ID_CLIENT']) ?>">Retour Gestion
        Campagnes</a>
</div>


<?php
$table = new \CodeIgniter\View\Table();
$table->setHeading('Question', 'Modifier', 'Supprimer');
foreach ($questions as $question) {
    $table->addRow(
        $question['QUESTION'],
        '<a href="' . url_to('modif_question_get', $question['ID_QUESTION']) . '"><button class="button button-modifier">Modifier</button></a>',
        '<form class="form-suppression" action="' . url_to('suppr_question') . '" method="post">
            <input type="hidden" name="ID_QUESTION" value="' . $question['ID_QUESTION'] . '">
            <input type="hidden" name="ID_CAMPAGNE" value="' . $question['ID_CAMPAGNE'] . '">
            <button type="submit" class="button button-supprimer" 
            onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette question ?\')">Supprimer</button>
        </form>'
    );
}
echo '<div class="table-container">';
echo $table->generate();
echo '</div>';
?>

<?= $this->endSection() ?>