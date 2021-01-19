<!-- PAGE D'ACCUEIL HOME -->

<?php $this->title = "LE PAPACIONU PARIS"; ?>
<?php $this->description = "Bienvenue sur le site du Papacionu Paris. Retrouvez la carte de nos pizzas ainsi que nos coordonnées."; ?>

<?php if ($this->session->get('flashMessage')) { ?>
    <div class="flash-messages">
        <p><?= $this->session->show('register'); ?></p>
        <p><?= $this->session->show('login'); ?></p>
        <p><?= $this->session->show('logout'); ?></p>
    </div>
<?php } ?>

<section id="home-bloc">
    <img src="../public/img/icone-fond-detoure-new.png" class="background-icon" alt="background icon" />

    <div id="encart-home">
        <p>OUVERT DU LUNDI AU DIMANCHE</p>

        <p id="click-home-p">Pour commander en ligne</p>
        <a href="https://papacionuparis.byclickeat.fr/order?fbclid=IwAR3i-74lj-cwhRtYQYjZutW0KTdYPFfO_gEK1uXBlDmk_Cu9WWIQ9Dq1IXQ" target="_blank" id="click-home-link">Click & Collect</a>
    </div>

    <ul class="gallery">
        <li><a class="pizza-picture-home1"><img src="../public/img/entree-resto.jpeg" alt="photo entrée resto" /></a></li>
        <li><a class="pizza-picture-home2"><img src="../public/img/bas-resto.jpg" alt="photo bas resto" /></a></li>
        <li><a class="pizza-picture-home11"><img src="../public/img/pizza7.jpg" alt="photo pizza" /></a></li>
        <li><a class="pizza-picture-home4"><img src="../public/img/bas-resto-tri.jpeg" alt="photo bas resto" /></a></li>
        <li><a class="pizza-picture-home5"><img src="../public/img/bar-noir-blanc.jpg" alt="photo bar" /></a></li>
        <li><a class="pizza-picture-home8"><img src="../public/img/pizza6.jpeg" alt="photo pizza" /></a></li>
        <li><a class="pizza-picture-home7"><img src="../public/img/haut-resto.jpeg" alt="photo haut resto" /></a></li>
        <li><a class="pizza-picture-home9"><img src="../public/img/pizza9.jpeg" alt="photo pizza" /></a></li>
        <li><a class="pizza-picture-home10"><img src="../public/img/pizza10.jpeg" alt="photo pizza" /></a></li>
        <li><a class="pizza-picture-home12"><img src="../public/img/pizza8.jpeg" alt="photo pizza" /></a></li>
    </ul>
</section>

<footer>
    <div id="footer">
        <?php
        if ($this->session->get('username')) {
        ?>
            <a href="../public/index.php?route=administration" class="admin-nav">Administration</a>
            <a href="../public/index.php?route=logout" class="logout-nav">Déconnexion</a>
        <?php
        } else {
        ?>
            <a href="../public/index.php?route=login" id="admin-button"><i class="fas fa-users-cog"></i></a>
        <?php
        }
        ?>
    </div>
</footer>