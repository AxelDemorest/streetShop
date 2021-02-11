<?php

session_start();

require_once '../../database/database.php';

require "admin_functions.php";

?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="admin.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../../website_part/header.css">
    <title>Administration</title>
</head>

<body>

    <div class="d-flex flex-row">
        <div id="side_bar" class="d-flex flex-column align-items-center">
            <h2 class="pm-text text-white mt-3" style="opacity:0.6">StreetShop</h2>
            <ul id="list-sidebar" class="ps-0 pt-3">
                <li class="pt-1"><a href="" class="text-decoration-none text-white fw-light" style="opacity:0.6">Accueil</a></li>
                <li class="pt-4"><a href="" class="text-decoration-none text-white fw-light" style="opacity:0.6">Utilisateurs</a></li>
                <li class="pt-4"><a href="" class="text-decoration-none text-white fw-light" style="opacity:0.6">Catégories</a></li>
                <li class="pt-4"><a href="" class="text-decoration-none text-white fw-light" style="opacity:0.6">Produits</a></li>
                <li class="pt-4"><a href="" class="text-decoration-none text-white fw-light" style="opacity:0.6">Commandes</a></li>
            </ul>
        </div>


        <div class="d-flex flex-column align-items-center" style="width:85%">
            <div class="w-100 border-2 border-bottom d-flex flex-row align-items-center justify-content-end" style="height:3em">
                <img src="../../img/lock.png" class="me-2" width="20px" alt="">
                <p class="fz-text me-3 mb-0">Connecté en tant que <?= $_SESSION['auth']->lastName ?></p>
            </div>
            <h1 class="pm-text">Administrateur</h1>
            <div class="d-flex flex-row flex-wrap mt-4">
                <div class="rounded border border-2 shadow-sm p-4 ">
                    <?php if (!empty($errors)) : ?>
                        <div class="alert alert-danger pb-0 mx-auto" style="font-size:14px">
                            <ul class="ps-0">

                                <?php foreach ($errors as $error) : ?>

                                    <li><?= $error; ?></li>

                                <?php endforeach; ?>

                            </ul>
                        </div>

                    <?php endif; ?>
                    <form action="" class="d-flex flex-column" method="POST">
                        <input name="userSupp" class="border border-1 rounded shadow-sm fw-light text-center" style="opacity:0.6" type="text" placeholder="e-mail de l'utilisateur">
                        <input name="submitSupp" class="btn btn-danger mt-4" type="submit" value="Supprimer l'utilisateur">
                    </form>
                </div>

            </div>
        </div>
    </div>

</body>

</html>