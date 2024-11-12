<?php $this->setVar('titre', 'Connexion'); ?>
<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>


<form method="post" action="">
    <label for="identifiant">Identifiant</label>
    <input type="text" placeholder="Identifiant">
    <label for="password">Mot de passe</label>
    <input type="password" placeholder="Mot de passe">
    <input type="submit" value="Connexion">
</form>

<?= $this->endSection() ?>