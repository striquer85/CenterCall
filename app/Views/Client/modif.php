<?php $this->setVar('titre', 'Modification Client'); ?>
<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>


<form method="post" action="<?= url_to('modif_client_post') ?>" class="form-container">
    <input type="hidden" id="ID_CLIENT" name="ID_CLIENT" value="<?= $client["ID_CLIENT"] ?>">
    <label class="required" for="ID_UTILISATEUR">Utilisateur</label>
    <select name="ID_UTILISATEUR">
        <option value="">Sélectionnez un utilisateur</option>
        <?php
        foreach ($listeUser as $user) {
            ?>
            <option value="<?= $user->id ?>" <?= ($user->id == $client['ID_UTILISATEUR']) ? 'selected' : '' ?>>
                <?= $user->username ?>
            </option>
            <?php
        }
        ?>
    </select>
    <div class="form-client">
        <label class="required">Raison Sociale</label>
        <input type="text" id="RAISON_SOCIALE" name="RAISON_SOCIALE" value="<?= $client['RAISON_SOCIALE'] ?>" required>

        <label class="required">Nom</label>
        <input type="text" id="NOM" name="NOM" value="<?= $client['NOM'] ?>" required>

        <label class="required">Prénom</label>
        <input type="text" id="PRENOM" name="PRENOM" value="<?= $client['PRENOM'] ?>" required>

        <label class="required">Email</label>
        <input type="email" id="EMAIL" name="EMAIL" value="<?= $client['EMAIL'] ?>" required>
    </div>

    <div class="form-client">
        <label class="required">Téléphone</label>
        <input type="text" id="TELEPHONE" name="TELEPHONE" value="<?= $client['TELEPHONE'] ?>" required>

        <label class="required">Adresse</label>
        <input type="text" id="ADRESSE" name="ADRESSE" value="<?= $client['ADRESSE'] ?>" required>

        <label class="required">Code Postal</label>
        <input type="text" id="CODE_POSTAL" name="CODE_POSTAL" value="<?= $client['CODE_POSTAL'] ?>" required>

        <label class="required">Ville</label>
        <input type="text" id="VILLE" name="VILLE" value="<?= $client['VILLE'] ?>" required>
    </div>

    <input class="submit-client" type="submit" value="Valider">
</form>





<?= $this->endSection() ?>