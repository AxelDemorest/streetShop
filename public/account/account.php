<?php

session_start();

require_once '../../database/database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../../website_part/header.css">
    <title>Profil - StreetShop</title>
</head>

<body>
    <?php

    require "../../website_part/header.php";

    if (isset($_GET['id'])) :

        $listUsers = $pdo->prepare("SELECT * FROM Users WHERE usersId = ?");

        $listUsers->execute([$_GET['id']]);

        $listUsers = $listUsers->fetch(PDO::FETCH_ASSOC);

        if (!$listUsers) : ?>

            <h1 class="pm-text mx-auto text-center mt-5">Utilisateur introuvable</h1>

        <?php endif; ?>

        <div class="d-flex flex-column align-items-center mt-5">
            <div class="w-50 shadow rounded p-4 d-flex flex-column align-items-center">
                <h2 class="pm-text mx-auto text-center">Informations du compte</h2>
                <p class="mt-4">E-mail : <?= $listUsers['email'] ?></p>
                <p class="mt-3">Nom : <?= $listUsers['lastName'] ?></p>
                <p class="mt-3">Prénom : <?= $listUsers['firstName'] ?></p>
                <p class="mt-3">Statut : <?php if ($listUsers['rank'] == 1) {
                                                echo "Administrateur";
                                            } else {
                                                echo "Membre";
                                            } ?></p>
                <p class="mt-3">Genre : <?php echo $listUsers['gender'] ?></p>
                <p class="mt-3">Date de création : <?php echo $listUsers['created_at'] ?></p>
            </div>

        </div>

        <?php else :

        if (!isset($_SESSION['auth'])) : ?>

            <h1 class="pm-text mx-auto text-center mt-5">Page introuvable</h1>

        <?php else: ?>

        <?php

        $fetchUser = $pdo->prepare("SELECT * FROM Users WHERE usersId = ?");

        $fetchUser->execute([$_SESSION['auth']->usersId]);

        $fetchUser = $fetchUser->fetch(PDO::FETCH_ASSOC);

        ?>
        <div class="d-flex flex-column align-items-center mt-5">
            <div class="w-50 shadow rounded p-4 d-flex flex-column align-items-center">
                <h2 class="pm-text mx-auto text-center">Informations du compte</h2>
                <p class="mt-4">E-mail : <?= $fetchUser['email'] ?></p>
                <p class="mt-3">Nom : <?= $fetchUser['lastName'] ?></p>
                <p class="mt-3">Prénom : <?= $fetchUser['firstName'] ?></p>
                <p class="mt-3">Statut : <?php if ($fetchUser['rank'] == 1) {
                                                echo "Administrateur";
                                            } else {
                                                echo "Membre";
                                            } ?></p>
                <p class="mt-3">Genre : <?php echo $fetchUser['gender'] ?></p>
                <p class="mt-3">Date de création : <?php echo $fetchUser['created_at'] ?></p>
            </div>

            <div class="w-50 shadow rounded p-4 mt-5 d-flex flex-column align-items-center mb-5">
                <h2 class="pm-text mx-auto text-center">Historique des commandes</h2>

                <?php

                //SELECT * FROM Orders RIGHT JOIN OrdersLines ON Orders.ordersId = OrdersLines.ordersId RIGHT JOIN Products ON OrdersLines.productsId = Products.productsId WHERE usersId = ?"

                $fetchHistCommandes = $pdo->prepare("SELECT * FROM Orders WHERE usersId = ? ORDER BY ordersDate");

                $fetchHistCommandes->execute([$_SESSION['auth']->usersId]);

                $fetchHistCommandes = $fetchHistCommandes->fetchAll(PDO::FETCH_ASSOC);

                foreach ($fetchHistCommandes as $key => $value) :

                    $fetchHistCommandes2 = $pdo->prepare("SELECT * FROM OrdersLines RIGHT JOIN Products ON OrdersLines.productsid = Products.productsid WHERE ordersId = ?");

                    $fetchHistCommandes2->execute([$value['ordersId']]);

                    $fetchHistCommandes2 = $fetchHistCommandes2->fetchAll(PDO::FETCH_ASSOC);

                ?>

                    <div class="border border-2 pt-2 px-5 rounded mt-4">
                        <p style="font-size:18px">Commande du <?php echo $value['ordersDate'] ?> :</p>
                        <p class="fw-bold">Produits :</p>
                        <?php foreach ($fetchHistCommandes2 as $key => $value) : ?>
                            <p class="fst-italic">- <?= $value['productsName'] ?> x<?= $value['quantity'] ?></p>
                        <?php endforeach; ?>
                    </div>


                <?php endforeach; ?>




            </div>

        </div>
        <?php endif; ?>

    <?php endif; ?>

    <script src="../ajax/ajax.js"></script>
</body>

</html>