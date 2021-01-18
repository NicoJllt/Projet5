<!-- PAGE MENU -->

<?php $this->title = "La carte - PAPACIONU PARIS"; ?>
<?php $this->description = "Retrouvez toutes nos pizzas à emporter grâce à notre menu en ligne."; ?>

<div id="menu-bloc">
    <section id="title-subtitle-bloc">

        <h1 id="menu-title"><img src="../public/img/titre-menu-detoure.png" class="logo-menu" id="titre-logo-menu" alt="titre photo" /></h1>
        <h2 id="menu-subtitle">Des produits de qualité cuisinés avec amour !</h2>
    </section>

    <div id="menu-order">
        <a href="https://papacionuparis.byclickeat.fr/order?fbclid=IwAR3i-74lj-cwhRtYQYjZutW0KTdYPFfO_gEK1uXBlDmk_Cu9WWIQ9Dq1IXQ" target="_blank">COMMANDER EN LIGNE</a>
    </div>

    <h3 id="nos-antipasti"><img src="../public/img/antipasti-menu-new.png" class="logos-menu" id="antipasti-logo-menu" alt="antipasti photo" /></h3>
    <table class="products-price-element">
        <tbody class="menu-products">
            <?php
            foreach ($elements as $other) {
                if ($other->getCategory() === 'Entrée') {
            ?>
                    <tr>
                        <td class="menu-description"><?= htmlspecialchars($other->getDescription()); ?></td>
                        <td class="menu-price"><?= htmlspecialchars($other->getPrice()); ?>€</td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

    <h3 id="nos-pizza-menu"><img src="../public/img/pizza-menu-new.png" class="logos-menu" id="pizza-logo-menu" alt="pizza photo" /></h3>
    <div id="pizza-format">Demi-lune <i class="fas fa-user"></i> | Grande (50cm) <i class="fas fa-user-friends"></i></div>

    <table class="products-price-element">
        <tbody class="menu-products">
            <?php
            foreach ($pizzas as $pizza) {
            ?>
                <tr>
                    <td scope="row" class="nom-pizza"><?= htmlspecialchars($pizza->getName()); ?></td>
                    <td class="pizza-menu-description"><?= htmlspecialchars($pizza->getDescription()); ?></td>
                    <td class="menu-price"><?= htmlspecialchars($pizza->getPriceSmall()); ?>€
                        <?php if (!empty($pizza->getPriceBig())) { ?> |
                            <?php echo htmlspecialchars($pizza->getPriceBig()); ?>€
                        <?php
                        } ?>
                    </td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

    <h3 id="nos-desserts"><img src="../public/img/desserts-menu-new.png" class="logos-menu" id="dessert-logo-menu" alt="desserts photo" /></h3>
    <table class="products-price-element">
        <tbody class="menu-products">
            <?php
            foreach ($elements as $other) {
                if ($other->getCategory() === 'Dessert') {
            ?>
                    <tr>
                        <td class="menu-description"><?= htmlspecialchars($other->getDescription()); ?></td>
                        <td class="menu-price"><?= htmlspecialchars($other->getPrice()); ?>€</td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

    <h3 id="nos-glaces"><img src="../public/img/glaces-menu-new.png" class="logos-menu" id="glace-logo-menu" alt="glaces photo" /></h3><br>
    <table class="products-price-element">
        <tbody class="menu-products">
            <?php
            foreach ($elements as $other) {
                if ($other->getCategory() === 'Glace') {
            ?>
                    <tr>
                        <td class="menu-description"><?= htmlspecialchars($other->getDescription()); ?></td>
                        <td class="menu-price"><?= htmlspecialchars($other->getPrice()); ?>€</td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

    <h3 id="nos-vins"><img src="../public/img/vin-menu-new.png" class="logos-menu" id="vin-logo-menu" alt="vin photo" /></h3>
    <table class="products-price-element">
        <tbody class="menu-products">
            <?php
            foreach ($elements as $other) {
                if ($other->getCategory() === 'Vin') {
            ?>
                    <tr>
                        <td class="menu-description"><?= htmlspecialchars($other->getDescription()); ?></td>
                        <td class="menu-price"><?= htmlspecialchars($other->getPrice()); ?>€</td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

    <h3 id="nos-boissons"><img src="../public/img/boisson-menu-new.png" class="logos-menu" id="boisson-logo-menu" alt="boissons photo" /></h3>
    <table class="products-price-element">
        <tbody class="menu-products">
            <?php
            foreach ($elements as $other) {
                if ($other->getCategory() === 'Boisson') {
            ?>
                    <tr>
                        <td class="menu-description"><?= htmlspecialchars($other->getDescription()); ?></td>
                        <td class="menu-price"><?= htmlspecialchars($other->getPrice()); ?>€</td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>

    <div id="pizza-picture-bloc-menu">
        <img src="../public/img/pizza3.jpg" class="pizza-picture-menu" alt="photo pizza" />
        <img src="../public/img/pizza4.jpg" class="pizza-picture-menu" alt="photo pizza" />
    </div>

    <div>
        <img src="../public/img/logo-footer.jpg" class="logo-footer-menu" alt="logo bas de page" />
    </div>
</div>

<footer>
</footer>