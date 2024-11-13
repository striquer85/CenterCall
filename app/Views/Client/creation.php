<?php $this->setVar('titre', 'Création Client'); ?>
<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>

<form method="post" action="<?= url_to('creation-client_post') ?>" class="form-container">
    <label class="required" for="ID_UTILISATEUR">Utilisateur</label>
    <select name="ID_UTILISATEUR">
        <option value="">Sélectionnez un utilisateur</option>
        <?php
        foreach ($listeUser as $user) {
            ?>
            <option value="<?= $user->id ?>"><?= $user->username ?></option>
            <?php
        }
        ?>
    </select>
    <div class="form-client">
        <label class="required" for="RAISON_SOCIALE">Raison Sociale</label>
        <input type="text" id="RAISON_SOCIALE" name="RAISON_SOCIALE" placeholder="Ex: Entreprise XYZ" required>

        <label class="required" for="NOM">Nom</label>
        <input type="text" id="NOM" name="NOM" placeholder="Ex: Dupont" required>

        <label class="required" for="PRENOM">Prénom</label>
        <input type="text" id="PRENOM" name="PRENOM" placeholder="Ex: Jean" required>

        <label class="required" for="EMAIL">Email</label>
        <input type="email" id="EMAIL" name="EMAIL" placeholder="Ex: jean.dupont@email.com" required>
    </div>
    <div class="form-client">
        <label class="required" for="TELEPHONE">Téléphone</label>
        <input type="text" id="TELEPHONE" name="TELEPHONE" placeholder="Ex: 0601020304" required>

        <label class="required" for="ADRESSE">Adresse</label>
        <input type="text" id="ADRESSE" name="ADRESSE" placeholder="Ex: 123 rue de Paris" required>

        <label class="required" for="CODE_POSTAL">Code Postal</label>
        <input type="text" id="CODE_POSTAL" name="CODE_POSTAL" placeholder="Ex: 75000" required>

        <label class="required" for="VILLE">Ville</label>
        <input type="text" id="VILLE" name="VILLE" placeholder="Ex: Paris" required>
    </div>
    <input class="submit-client" type="submit" value="Valider">

    
</form>
<?= $this->endSection() ?>