<?php
session_start();

require_once '../../database/database.php';

require "confirm_sign_in.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../../website_part/header.css">
    <title>Connexion - StreetShop</title>
</head>

<body>
    <?php require "../../website_part/header.php" ?>

    <div class="d-flex justify-content-center fz-text">
        <form action="" method="POST" class="mt-5 w-50">
            <div class="mb-3 bg-white rounded shadow-sm border border-2 p-4">
                <h2 class="text-center">Connexion</h2>
                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger pb-0 mt-3">
                        <ul>

                            <?php foreach ($errors as $error) : ?>

                                <li><?= $error; ?></li>

                            <?php endforeach; ?>

                        </ul>
                    </div>

                <?php endif; ?>
                <label for="email" class="form-label text-muted text-uppercase ms-1" style="font-size:12px;opacity:0.7">e-mail</label>
                <input name="email" type="email" class="form-control mb-3" id="email" style="font-size: 14px">

                <label for="password" class="form-label text-muted text-uppercase ms-1" style="font-size:12px;opacity:0.7">Mot de passe</label>
                <input name="password" type="password" class="form-control mb-3" id="password" style="font-size: 14px">

                <input type="submit" class="btn btn-primary" name="submit" style="font-size:14px" value="Valider la connexion">
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>