<?php $this->title = "Connexion administrateur"; ?>

<div class="blocpage">
    <?php include("template_header.php") ?>

    <form method="post" action="../public/index.php?route=login" id="login-section">
        <div class="constraint-error">
            <?= $this->session->show('error_login'); ?><br>
        </div>
        <label for="pseudo">NOM D'UTILISATEUR</label><br>
        <input type="text" id="pseudo" name="username" value="<?= isset($post) ? htmlspecialchars($post->get('username')) : ''; ?>"><br>
        <label for="password">MOT DE PASSE</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="connexion" class="submit-form" name="submit">
    </form>
</div>