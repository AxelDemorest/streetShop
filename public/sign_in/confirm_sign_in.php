<?php

if (!empty($_POST)) {

    $errors = array();

    $valid = true;

    if (isset($_POST['submit'])) {

        $email  = htmlspecialchars(trim($_POST['email']));
        $password  = htmlspecialchars(trim($_POST['password']));

        if ((empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) || empty($password)) {
            $errors['input'] = "Un des champs n'a pas été complété.";
            $valid = false;
        }

        if ($valid && empty($errors)) {

            $req = $pdo->prepare('SELECT * FROM Users WHERE email = :email');

            $req->execute(['email' => $email]);

            $result = $req->fetch();

            if (empty($result)) {

                $errors['error'] = "Utilisateur ou mot de passe incorrect.";
                
            } else {

                if (password_verify($password, $result->password)) {

                    $_SESSION['auth'] = $result;

                    header('Location: http://localhost:8888/streetShop/public/home/home.php');

                    exit;

                } else {

                    $errors['bddPassword'] = "Utilisateur ou mot de passe incorrect.";

                }
            }
        }
    }
}
