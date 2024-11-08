<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<div class="titre-container">
    <h1 class="titreMenu">Connexion</h1>
</div>
<form method="post" action="<?= url_to('connexion_post') ?>">
    <label for="identifiant">Identifiant</label>
    <input type="text" placeholder="Identifiant">
    <label for="password">Mot de passe</label>
    <input type="password" placeholder="Mot de passe">
    <input type="submit" value="Connexion">
</form>

<?= $this->endSection() ?>