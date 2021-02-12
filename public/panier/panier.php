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

    if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) : // Si le panier est vide ou qu'il n'existe pas

        $tablPanier = $_SESSION['panier'];
        $taille = count($tablPanier);

        $arrayPrices = array(); // Je crée un tableau vide

    ?>

        <h1 class="pm-text text-center mt-4">Panier</h1>

        <div class="alert alert-success w-25 text-center mx-auto mt-4" id="alert-ajax" role="alert" style="display:none;">
            Commande effectuée avec succès
        </div>

        <div class="d-flex flex-column align-items-center mt-5 mb-5">

            <?php foreach ($tablPanier as $key => $value) : // Je parcours le panier ($value c'est les noms des produits et key c'est leurs id)

                $reqFetchProductsOfPanier = $pdo->prepare('SELECT * FROM Products WHERE productsName = ?'); // Je récupère toutes les infos de chaque produit à chaque tour de boucle grâce à Value

                $reqFetchProductsOfPanier->execute([$value]);

                $result = $reqFetchProductsOfPanier->fetch(PDO::FETCH_ASSOC); // Je récupère les infos de la requête sous forme de tableau

                array_push($arrayPrices, $result['price'] * $_SESSION['panierQuantity'][$result['productsId']]); // Je push le prix dans mon tableau prix

            ?>
                <div class="w-50 rounded shadow-sm mb-4 flex-row p-3 align-items-center justify-content-between all_panier" style="display:flex;">
                    <div class="d-flex flex-row align-items-center">
                        <img src="<?= $result['productsImg'] ?>" width="10%" alt="">
                        <div class="d-flex flex-column ms-4">
                            <p class="text-muted fw-light">Nom du produit :</p>
                            <h5 class="card-title text-start mt-1"><?php echo $value; ?></h5>
                        </div>
                        <div class="d-flex flex-column ms-5">
                            <p class="text-muted fw-light">Prix du produit :</p>
                            <h5 class="card-title text-start mt-1"><?php echo $result['price']; ?>€</h5>
                        </div>
                        <div class="d-flex flex-column ms-5">
                            <p class="text-muted fw-light">Quantité :</p>
                            <h5 class="card-title text-start mt-1"><?php  echo $_SESSION['panierQuantity'][$result['productsId']]; ?></h5>
                        </div>
                    </div>
                    <button onclick="supp_product_panier('<?= $value ?>', <?= $result['productsId'] ?> ,<?= $result['productsStock'] ?>)" class="btn btn-danger" style="max-width:10em;font-size:13px">Supprimer</button>
                </div>
            <?php endforeach; ?>

            <div class="button_group">

                <h5 class="mb-4 text-center">Prix total à payer : <?= array_sum($arrayPrices) ?>€</h5>

                <?php if (isset($_SESSION['auth'])) : // Si l'user est connecté, il peut valider son panier, sinon non 
                ?>

                    <div class="flex-row" style="display:flex">
                        <button onclick="supp_all_product_panier()" class="btn btn-danger me-4" style="max-width:15em;font-size:17px">Supprimer le panier</button>
                        <button onclick="validation_panier()" class="btn btn-success" style="max-width:10em;font-size:17px">Valider le panier</button>
                    </div>
            </div>

        <?php else : ?>

            <div class="button_group">
                <p>Vous devez être connecté pour valider votre commande</p>
                <div class="flex-row" style="display:flex">
                    <button onclick="supp_all_product_panier()" class="btn btn-danger me-4" style="max-width:15em;font-size:17px">Supprimer le panier</button>
                    <button onclick="validation_panier()" class="btn btn-success disabled" style="max-width:10em;font-size:17px">Valider le panier</button>
                </div>
            </div>


        <?php endif; ?>
        </div>

    <?php else : ?>

        <h1 class="pm-text text-center mt-4">Le panier est vide</h1>

    <?php endif; ?>

    <script src="../ajax/ajax.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>