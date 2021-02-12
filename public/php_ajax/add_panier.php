<?php

session_start();

require "../../database/database.php";

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

if (!isset($_SESSION['panierQuantity'])) {
    $_SESSION['panierQuantity'] = array();
}

if ($_POST['productsStock'] == 1) {

    $response['error'] = "error_stock";

    echo json_encode($response);
}

if (isset($_SESSION['panier'][$_POST['productId']])) {

    $_SESSION['panierQuantity'][$_POST['productId']] = $_SESSION['panierQuantity'][$_POST['productId']] + 1;

} else {

    $_SESSION['panierQuantity'][$_POST['productId']] = 1;
}

$_SESSION['panier'][$_POST['productId']] = $_POST['product'];

$req = $pdo->prepare("UPDATE Products SET productsStock = ? WHERE productsId = ?");

$req->execute([$_POST['productsStock'] - 1, $_POST['productId']]);
