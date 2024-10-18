<?= $this->extend('layout') ?>
<?= $this->section('contenu') ?>
<h1 id="titreMenu">Connexion</h1>
<form method="post" action="<?= url_to('connexion_post') ?>">
    <label for="identifiant">Identifiant</label> <br>
    <input type="text" placeholder="Identifiant"><br>
    <label for="password">Mot de passe</label> <br>
    <input type="password" placeholder="Mot de passe"><br>
    <input type="submit" value="Connexion"><br>
</form>

<?= $this->endSection() ?>