<?php $this->title = 'Modifier le mot de passe'; ?>

<div id="update-password-bloc">
    <p>Le mot de passe de <?= $this->session->get('username'); ?> sera modifié.</p>
    <form method="post" action="../public/index.php?route=updatePassword">
        <label for="password-input">Nouveau mot de passe</label><br>
        <input type="password" class="password-input" name="password"><br>
        <div class="constraint-error">
            <?= $this->session->show('update_password_failed'); ?><br>
        </div>
        <input type="submit" value="Mettre à jour" class="submit-form" name="submit">
    </form>
</div>