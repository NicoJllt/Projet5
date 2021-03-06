<?php $this->title = 'Administration'; ?>

<?php if ($this->session->get('flashMessage')) { ?>
    <div class="flash-messages">
        <p><?= $this->session->show('add_pizza'); ?></p>
        <p><?= $this->session->show('edit_pizza'); ?></p>
        <p><?= $this->session->show('delete_pizza'); ?></p>
        <p><?= $this->session->show('add_element'); ?></p>
        <p><?= $this->session->show('edit_element'); ?></p>
        <p><?= $this->session->show('delete_element'); ?></p>
        <p><?= $this->session->show('delete_user'); ?></p>
        <p><?= $this->session->show('update_password'); ?></p>
    </div>
<?php } ?>

<section id="bloc-admin">
    <h1>PAGE ADMINISTRATION</h1>
    <h2>PIZZAS</h2>
    <div class="add-element-button">
        <a href="../public/index.php?route=addPizza">Ajouter une nouvelle pizza</a>
    </div>
    <table id="pizza-table-admin">
        <tr>
            <td>Id</td>
            <td>Nom</td>
            <td>Description</td>
            <td>Prix 1P</td>
            <td>Prix 2P</td>
            <td class="action-admin">ACTION</td>
        </tr>
        <?php
        foreach ($pizzas as $pizza) {
        ?>
            <tr>
                <td><?= htmlspecialchars($pizza->getId()); ?></td>
                <td><?= substr(htmlspecialchars($pizza->getName()), 0, 50); ?></td>
                <td><?= substr(htmlspecialchars($pizza->getDescription()), 0, 500); ?></td>
                <td><?= htmlspecialchars($pizza->getPriceSmall()); ?></td>
                <td><?= htmlspecialchars($pizza->getPriceBig()); ?></td>
                <td>
                    <a class="edit-button" href="../public/index.php?route=editPizza&id=<?= $pizza->getId(); ?>">Modifier</a>
                    <a class="delete-button" onclick="return confirm('Souhaitez-vous vraiment supprimer cette pizza ?');" href="../public/index.php?route=deletePizza&id=<?= $pizza->getId(); ?>">Supprimer</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <h2>AUTRES</h2>
    <div class="add-element-button">
        <a href="../public/index.php?route=addElement">Ajouter un nouvel élément</a>
    </div>
    <table id="other-table-admin">
        <tr>
            <td>Id</td>
            <td>Description</td>
            <td>Prix</td>
            <td>Catégorie</td>
            <td class="action-admin">ACTION</td>
        </tr>
        <?php
        foreach ($elements as $other) {
        ?>
            <tr>
                <td><?= htmlspecialchars($other->getId()); ?></td>
                <td><?= substr(htmlspecialchars($other->getDescription()), 0, 500); ?></td>
                <td><?= htmlspecialchars($other->getPrice()); ?></td>
                <td><?= htmlspecialchars($other->getCategory()); ?></td>
                <td>
                    <a class="edit-button" href="../public/index.php?route=editElement&id=<?= $other->getId(); ?>">Modifier</a>
                    <a class="delete-button" onclick="return confirm('Souhaitez-vous vraiment supprimer cet élément ?');" href="../public/index.php?route=deleteElement&id=<?= $other->getId(); ?>">Supprimer</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <h2>UTILISATEURS</h2>
    <table id="user-table-admin">
        <p id="session-name">SESSION ACTIVE : <?= $this->session->get('username'); ?></p>
        <a href="../public/index.php?route=updatePassword" id="edit-password">Modifier mon mot de passe</a>
        <tr>
            <td>Id</td>
            <td>Nom d'utilisateur</td>
            <td>Date d'inscription</td>
            <td class="action-admin">ACTION</td>
        </tr>
        <?php
        foreach ($users as $user) {
        ?>
            <tr>
                <td><?= htmlspecialchars($user->getId()); ?></td>
                <td><?= htmlspecialchars($user->getUsername()); ?></td>
                <td>Créé le : <?= htmlspecialchars($user->getRegistrationDate()); ?></td>
                <td>
                    <?php
                    if ($user->getIsActive() != 1) {
                    ?>
                        <a href="../public/index.php?route=deleteUser&id=<?= $user->getId(); ?>">Supprimer</a>
                    <?php } else {
                    ?>
                        <p>Suppression impossible</p>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</section>