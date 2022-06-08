<?php

require dirname(__DIR__) . '/functions.php';
require_once PATH_PROJECT . '/connect.php';
$send_request = false;


$email 		= filter_var(mb_strtolower(trim($_POST['email'])), FILTER_VALIDATE_EMAIL);
$pass1 		= trim($_POST['password']);
$pass2 		= trim($_POST['password2']);
$match_pass = check_password($pass1);
$required_fields = array($email, $pass1);

if(in_array('', $required_fields)) :
    $msg_error = '<div class="red">Vous devez remplir le(s) champ(s) obligatoire(s)</div>';
    $empty_field = TRUE;
else :
    if($pass1 != $pass2) :
        $msg_error = 'Les mots de passe ne correspondent pas';
    elseif(!$match_pass) :
        $msg_error = 'Le mot de passe ne correspond pas au format exigé';

    else :
        $req = $db->prepare("
				SELECT COUNT(id) count_email
				FROM users
				WHERE email = :email
			");
        $req->bindValue(':email', $email, PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_OBJ);

        if($result->count_email) : // si > 0
            $msg_error = 'Ce compte existe deja avec cet adresse email';
        else :

            $req = $db->prepare("
                        INSERT INTO users(email, password)
                        VALUES (:email, :password)
                    ");
            $req->bindValue(':email', $email, PDO::PARAM_STR);
            $req->bindValue(':password', password_hash($pass1, PASSWORD_DEFAULT), PDO::PARAM_STR);
            $result = $req->execute();

            if($result) :
                $msg_success = '<p class="red">Vous êtes bien inscrit</p>';
            else :
                $msg_error = '<p class="red">Oups !! erreur lors de la création du profil</p>';
            endif;
        endif;
    endif;
endif;
if(isset($msg_error)) {
    header('Location:' . HOME_URL . 'views/subscribe.php?msg=' . $msg_error);
}
else {
    header('Location:' . HOME_URL . 'views/subscribe.php?msg=' . $msg_success);
}


//Gwenhael33380@!