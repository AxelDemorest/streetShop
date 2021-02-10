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
    <title>Panier - StreetShop</title>
</head>

<body>
    <?php
    require "../../website_part/header.php";

    if (isset($_SESSION['panier'])) :

        $tablPanier = $_SESSION['panier'];
        $taille = count($tablPanier);

    ?>
        <h1 class="pm-text text-center mt-4">Panier</h1>

        <div class="d-flex flex-column align-items-center mt-5 mb-5">
            <?php for ($i = 0; $i < $taille; $i++) :

                $reqFetchProductsOfPanier = $pdo->prepare('SELECT * FROM Products WHERE productsName = ?');

                $reqFetchProductsOfPanier->execute([$tablPanier[$i]]);

                $result = $reqFetchProductsOfPanier->fetch(PDO::FETCH_ASSOC);
            ?>
                <div class="w-50 rounded shadow-sm mb-5 d-flex flex-row p-3 align-items-center justify-content-between">
                    <div class="d-flex flex-row align-items-center">
                        <img src="<?= $result['productsImg'] ?>" width="10%" alt="">
                        <div class="d-flex flex-column ms-4">
                            <p class="text-muted fw-light">Nom du produit :</p>
                            <h5 class="card-title text-start mt-1"><?php echo $tablPanier[$i]; ?></h5>
                        </div>
                        <div class="d-flex flex-column ms-5">
                            <p class="text-muted fw-light">Prix du produit :</p>
                            <h5 class="card-title text-start mt-1"><?php echo $result['price']; ?>€</h5>
                        </div>
                    </div>
                    <button class="btn btn-danger" style="max-width:10em;font-size:13px">Supprimer</button>
                </div>
            <?php endfor; ?>
            <button class="btn btn-success" style="max-width:10em;font-size:17px">Valider le panier</button>
        </div>

    <?php endif; ?>

</body>

</html>