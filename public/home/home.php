<?php

session_start();

require_once '../../database/database.php';

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="home.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../../website_part/header.css">
    <title>Inscription - StreetShop</title>
</head>

<body class="pb-5">
    <?php

    require "../../website_part/header.php";

    ?>

    <div id="fond" class="pb-5">

        <h1 class="pm-text">Tous les produits</h1>

        <ul class="mt-5 mx-4 d-flex flex-row" style="overflow-x:auto">
            <?php

            $reqFetchProducts = $pdo->query('SELECT * FROM Products');
            while ($result = $reqFetchProducts->fetch(PDO::FETCH_ASSOC)) :
            ?>
                <li class="me-3">
                    <div class="card" style="width: 18rem;height:34em">
                        <div style="height: 100%" class="d-flex align-items-center">
                            <img src="<?= $result['productsImg'] ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body d-flex flex-column justify-content-end">
                            <h5 class="card-title text-center"><?php echo $result['productsName'] ?></h5>
                            <p class="card-text text-center mb-0"><?php echo $result['price'] ?>€</p>
                            <a onclick="add_panier('<?php echo $result['productsName'] ?>')" class="btn btn-primary mt-3">Commander</a>
                        </div>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>

    <?php
    $reqFetchCategories = $pdo->query('SELECT * FROM categories');

    while ($resultCategories = $reqFetchCategories->fetch()) :

        $reqFetchProductsOfCategories = $pdo->prepare('SELECT * FROM Categories RIGHT JOIN Products ON Categories.categoriesId = Products.categoriesId WHERE categoriesName = ?');

        $reqFetchProductsOfCategories->execute([$resultCategories->categoriesName]);
    ?>
        <div id="<?= $resultCategories->categoriesName ?>">
            <div id="fond" class="pb-5">
                <h1 class="pm-text">Les <?= $resultCategories->categoriesName ?></h1>

                <ul class="mt-5 mx-4 d-flex flex-row" style="overflow-x:auto">
                    <?php

                    while ($resultProductsOfCategories = $reqFetchProductsOfCategories->fetch(PDO::FETCH_ASSOC)) :
                    ?>
                        <li class="mx-3">
                            <div class="card" style="width: 18rem;height:34em">
                                <div style="height: 100%" class="d-flex align-items-center">
                                    <img src="<?= $resultProductsOfCategories["productsImg"] ?>" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body d-flex flex-column justify-content-end">
                                    <h5 class="card-title text-center"><?php echo $resultProductsOfCategories['productsName'] ?></h5>
                                    <p class="card-text text-center mb-0"><?php echo $resultProductsOfCategories['price'] ?>€</p>
                                    <a id="id-<?= $resultProductsOfCategories['categoriesId'] ?>" onclick="add_panier('<?= $resultProductsOfCategories['productsName'] ?>')" class="btn btn-primary mt-3">Commander</a>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    <?php endwhile; ?>

    <script src="home.js"></script>
    <script src="../../website_part/header.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>