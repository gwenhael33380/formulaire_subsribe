<?php
define('PATH_PROJECT', __DIR__);
define('HOME_URL', 'http://test/');
function check_password($pass) {
    preg_match('#^(?=(.*[A-Z])+)(?=(.*[a-z])+)(?=(.*[\d])+)(?=.*\W)(?!.*\s).{8,16}$#', $pass, $match);
    if(empty($match)) {
        return FALSE;
    }
    return TRUE;
}
function enabled_access(Array $enabled_access) {
    // if($_SERVER['REQUEST_URI'] != '/') : // je verifie que je ne suis pas dans la page home sinon boucle infinie
    if(
        !isset($_SESSION['id_user'])  // si je ne suis pas connecté
        || // OR
        (
            isset($enable_access)
            && // ET
            isset($_SESSION['id_user'])
            &&
            // si le rôle n'est pas dans le tableau
            !in_array($_SESSION['role_slug'], $enable_access)
        )
    ) :
        header('Location: ' . HOME_URL);
    endif;
    // endif;
}