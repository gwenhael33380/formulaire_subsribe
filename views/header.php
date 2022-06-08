<?php
require dirname(__DIR__) . '/functions.php';
require_once PATH_PROJECT . '/connect.php';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API beer</title>
    <link rel="stylesheet" href="<?php echo HOME_URL . 'assets/css/style.css'; ?>">
</head>
<header>
    <nav>
        <ul class="nav_bar_list">
            <li> <a href="<?php echo HOME_URL ?>">Acceuil</a></li>
            <li> <a href="<?php echo HOME_URL . 'views/subscribe.php'; ?>">inscription</a></li>
            <li> <a href=""></a></li>
            <li><a href=""></a>Connexion</li>
            <li> <a href="<?php echo HOME_URL . 'views/acces_beer_project.php'; ?>">accès au bière</a></li>
        </ul>
    </nav>
</header>
<body>


