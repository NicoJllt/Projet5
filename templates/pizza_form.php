<?php
$route = (isset($post) && $post->get('id')) ? 'editPizza&id=' . $post->get('id') : 'addPizza';
$submit = ($route === 'addPizza') ? 'Enregistrer' : 'Mettre à jour';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>" id="pizza-form">
    <?php if ($route === 'addPizza') { ?>
        <h1>Ajout d'une pizza</h1>
    <?php } else { ?>
        <h1>Modifier la <?= htmlspecialchars(($post->get('name'))); ?></h1>
    <?php } ?>

    <label for="name-pizza-form">Nom</label><br>
    <input type="text" id="name-pizza-input" name="name" value="<?= isset($post) ? htmlspecialchars(($post->get('name'))) : '' ?>"><br>
    <div class="constraint-error">
        <?= isset($errors['name']) ? $errors['name'] : '' ?>
    </div>

    <label for="description-pizza-form">Description</label><br>
    <textarea id="description-pizza-input" name="description"><?= isset($post) ? htmlspecialchars(($post->get('description'))) : '' ?></textarea><br>
    <div class="constraint-error">
        <?= isset($errors['description']) ? $errors['description'] : '' ?>
    </div>

    <label for="small-price-form">Prix pizza demi-lune (1 personne)</label><br>
    <input type="number" id="small-price-input" name="priceSmall" value="<?= isset($post) ? htmlspecialchars(($post->get('priceSmall'))) : '' ?>"><br>
    <div class="constraint-error">
        <?= isset($errors['priceSmall']) ? $errors['priceSmall'] : '' ?>
    </div>

    <label for="big-price-form">Prix pizza entière (2 personnes)</label><br>
    <input type="number" id="big-price-input" name="priceBig" value="<?= isset($post) ? htmlspecialchars(($post->get('priceBig'))) : '' ?>"><br>
    <div class="constraint-error">
        <?= isset($errors['priceBig']) ? $errors['priceBig'] : '' ?>
    </div>

    <input type="submit" value="<?= $submit; ?>" class="submit-form" name="submit">
</form>