<?php

if (isset($_POST['submitSupp'])) {

    $errors = array();

    $valid = true;

    if (empty($_POST['userSupp'])) {
        $errors['input'] = "Un des champs n'a pas été complété.";
        $valid = false;
    } else {
        $reqFetchMail = $pdo->prepare('SELECT email FROM Users WHERE email = ?');

        $reqFetchMail->execute([$_POST['userSupp']]);

        $user = $reqFetchMail->fetch();

        if (!$user) {
            $errors['useEmail'] = 'Cet utilisateur n\'existe pas.';
            $valid = false;
        }

        if ($valid && empty($errors)) {

            $req = $pdo->prepare("DELETE FROM Users WHERE email = ?");

            $req->execute([$_POST['userSupp']]);
        }
    }
}
