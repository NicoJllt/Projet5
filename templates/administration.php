<?php $this->title = 'Administration'; ?>

<?php if ($this->session->get('flashMessage')) { ?>
    <div class="flash-messages">
        <?= $this->session->show('add_element'); ?>
        <?= $this->session->show('edit_element'); ?>
        <?= $this->session->show('delete_element'); ?>
        <?= $this->session->show('delete_user'); ?>
    </div>
<?php } ?>

<section id="bloc-admin">
    <h1>PAGE ADMINISTRATION</h1>
    <h2>PIZZAS</h2>
    <div class="add-element-button">
        <a href="../public/index.php?route=addPizza">Ajouter une nouvelle pizza</a>
    </div>
    <table id="element-table-admin">
        <tr>
            <td>Id</td>
            <td>Nom</td>
            <td>Description</td>
            <td>Prix demi-lune</td>
            <td>Prix entière</td>
            <td>Actions</td>
        </tr>
        <?php
        foreach ($elements as $pizza) {
        ?>
            <tr>
                <td><?= htmlspecialchars($pizza->getId()); ?></td>
                <td><?= substr(htmlspecialchars($pizza->getName()), 0, 50); ?></td>
                <td><?= substr(htmlspecialchars($pizza->getDescription()), 0, 500); ?></td>
                <td><?= htmlspecialchars($pizza->getPriceSmall()); ?></td>
                <td><?= htmlspecialchars($pizza->getPriceBig()); ?></td>
                <td>
                    <a href="../public/index.php?route=editPizza&id=<?= $pizza->getEpisodeId(); ?>">Modifier</a>
                    <a href="../public/index.php?route=deletePizza&id=<?= $pizza->getEpisodeId(); ?>">Supprimer</a>
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
    <table id="element-table-admin">
        <tr>
            <td>Id</td>
            <td>Description</td>
            <td>Prix</td>
            <td>Actions</td>
        </tr>
        <?php
        foreach ($elements as $other) {
        ?>
            <tr>
                <td><?= htmlspecialchars($other->getId()); ?></td>
                <td><?= substr(htmlspecialchars($other->getDescription()), 0, 500); ?></td>
                <td><?= htmlspecialchars($other->getPrice()); ?></td>
                <td>
                    <a href="../public/index.php?route=editElement&id=<?= $other->getId(); ?>">Modifier</a>
                    <a href="../public/index.php?route=deleteElement&id=<?= $other->getId(); ?>">Supprimer</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

    <h2>UTILISATEURS</h2>
    <table id="user-table-admin">
        <tr>
            <td>Id</td>
            <td>Nom d'utilisateur</td>
            <td>Mail</td>
            <td>Actions</td>
        </tr>
        <?php
        foreach ($users as $user) {
        ?>
            <tr>
                <td><?= htmlspecialchars($user->getUserId()); ?></td>
                <td><?= htmlspecialchars($user->getUsername()); ?></td>
                <td><?= htmlspecialchars($user->getMail()); ?></td>
                <td>
                    <?php
                    if ($user->getRoleName() != 'admin') {
                    ?>
                        <a href="../public/index.php?route=deleteUser&userId=<?= $user->getUserId(); ?>">Supprimer</a>
                    <?php } else {
                    ?>
                        Suppression impossible
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