<?php

require "../../database/database.php";

session_start();

$req = $pdo->prepare("UPDATE Products SET productsStock = ? WHERE productsId = ?");

$req->execute([$_POST['productsStock'] + 1, $_POST['productId']]);

if($_SESSION['panierQuantity'][$_POST['productId']] > 1) {

    $_SESSION['panierQuantity'][$_POST['productId']] = $_SESSION['panierQuantity'][$_POST['productId']] - 1;

} else if ($_SESSION['panierQuantity'][$_POST['productId']] == 1) {

    unset($_SESSION['panierQuantity'][$_POST['productId']]);

    unset($_SESSION['panier'][$_POST['productId']]);

}
