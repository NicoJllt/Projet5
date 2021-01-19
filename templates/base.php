<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="icon" type="image/png" href="../public/img/icone-ter.png" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/contact.css" />
    <link rel="stylesheet" href="css/menu.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">-->
    <!--<link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <title><?= $title ?></title>
    <meta name="description" content="<?= $description ?>">
</head>

<body>
    <div class="blocpage">

        <div class="background-image-mobile">
        </div>

        <?php include("template_header.php") ?>

        <div id="content">
            <?= $content ?>
        </div>
    </div>
</body>

<script type="text/javascript" src="../public/js/responsiveSummary.js"></script>
<script type="text/javascript" src="../public/js/timeOutFlashMessage.js"></script>

</html>