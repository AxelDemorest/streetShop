<?php

if (!empty($_POST)) {

    $errors = array();

    $valid = true;

    if (isset($_POST['submit'])) {

        $lastName  = htmlspecialchars(trim($_POST['lastName']));
        $firstName  = htmlspecialchars(trim($_POST['firstName']));
        $email  = htmlspecialchars(trim($_POST['email']));
        $password  = htmlspecialchars(trim($_POST['password']));
        $confirmPassword  = htmlspecialchars(trim($_POST['confirmPassword']));

        if (empty($lastName) || empty($firstName) || (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) || empty($password) || empty($confirmPassword)) {
            $errors['input'] = "Un des champs n'a pas été complété.";
            $valid = false;
        }

        if ($password !== $confirmPassword) {
            $errors['confirmPassword'] = "Les deux mots de passe sont différents.";
            $valid = false;
        }

        $reqFetchMail = $pdo->prepare('SELECT usersId FROM Users WHERE email = ?');

        $reqFetchMail->execute([$email]);

        $user = $reqFetchMail->fetch();

        if ($user) {
            $errors['useEmail'] = 'Cet email est déjà utilisé.';
            $valid = false;
        }

        if ($valid && empty($errors)) {

            $req = $pdo->prepare("
                        INSERT INTO Users(firstName,lastName,email,gender,password)
                        VALUES (?, ?, ?, ?, ?)
                    ");

            $password = password_hash($password, PASSWORD_BCRYPT);

            $req->execute([$firstName, $lastName, $email, $_POST['genderRadios'], $password]);

            $reqFetchUser = $pdo->prepare("SELECT * FROM Users WHERE email = ?");

            $reqFetchUser->execute([$email]);

            $userConnexion = $reqFetchUser->fetch();

            $_SESSION['auth'] = $userConnexion;

            header('Location: http://localhost:8888/streetShop/public/home/home.php');

            exit;
        }
    }
}
