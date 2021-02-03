<?php $this->title = "Connexion administrateur"; ?>

<form method="post" action="../public/index.php?route=login" id="login-section">
    <h1>SE CONNECTER</h1>
    <div class="constraint-error">
        <?= $this->session->show('error_login'); ?><br>
    </div>
    <label for="pseudo">NOM D'UTILISATEUR</label><br>
    <input type="text" class="pseudo-input" name="username" value="<?= isset($post) ? htmlspecialchars($post->get('username')) : ''; ?>"><br>
    <label for="password">MOT DE PASSE</label><br>
    <input type="password" class="password-input" name="password"><br>
    <input type="submit" value="connexion" class="submit-form" name="submit">
</form>