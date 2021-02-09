<?php
$route = (isset($post) && $post->get('id')) ? 'editElement&id=' . $post->get('id') : 'addElement';
$submit = ($route === 'addElement') ? 'Enregistrer' : 'Mettre à jour';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>" id="element-form">
    <?php if ($route === 'addElement') { ?>
        <h1>Ajout d'un élément</h1>
    <?php } else { ?>
        <h1>Modifier l'élément</h1>
    <?php } ?>

    <label for="description-element-form">Description</label><br>
    <textarea id="description-element-input" name="description"><?= isset($post) ? htmlspecialchars(($post->get('description'))) : '' ?></textarea><br>
    <div class="constraint-error">
        <?= isset($errors['description']) ? $errors['description'] : '' ?>
    </div>

    <label for="element-price-form">Prix de l'élément</label><br>
    <input type="number" id="element-price-input" name="price" value="<?= isset($post) ? htmlspecialchars(($post->get('price'))) : '' ?>"><br>
    <div class="constraint-error">
        <?= isset($errors['price']) ? $errors['price'] : '' ?>
    </div>

    <label for="category">Catégorie</label><br>
    <select name="category" id="element-category-select">
        <option value="">Choix :</option>
        <option value="Entrée">Entrée</option>
        <option value="Dessert">Dessert</option>
        <option value="Glace">Glace</option>
        <option value="Vin">Vin</option>
        <option value="Boisson">Boisson</option>
    </select>

    <div class="constraint-error">
        <?= isset($errors['category']) ? $errors['category'] : '' ?>
    </div>

    <input type="submit" value="<?= $submit; ?>" class="submit-form" name="submit">
</form>