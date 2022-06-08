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
    <title>Connexion</title>
</head>
<body>
<div class="msg">
    <?php
    if(isset($_GET['msg'])) {
        echo $_GET['msg'];
    } ?>
</div>
    <form class="form-subscribe" action="<?php echo HOME_URL . 'requests/subscribe_post.php'; ?>" method="POST"
        <div class="field-subscribe">
            <label class="label-subscribe" for="email">Email<span class="red">*</span></label>
            <input class="input-form-subscribe" type="text" id="email" name="email" placeholder="Entrez votre Email...">
        </div>
        <div class="field-subscribe">
            <label class="label-subscribe" for="password">Mot de passe<span class="red">*</span></label>
            <input class="input-form-subscribe" type="password" id="password" name="password" placeholder="Veuillez choisir votre mot de passe">
            <!-- On répete 2 fois le mot de passe pour vérifier qu'il est exact -->
            <input class="input-form-subscribe input-margin" type="password" id="password2" name="password2" placeholder="Veuillez retapez votre mot de passe">
            <p class="text-mdp">Le mot de passe doit comprendre entre 8 et 16 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial, et pas d'espace</p>
            <button class="button-submit-subscribe" type="submit">S'inscrire</button>
        </div>
    </form>
</body>
</html>
