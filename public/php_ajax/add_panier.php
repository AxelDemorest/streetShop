<?php

session_start();

require "../../database/database.php";

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

$_SESSION['panier'][$_POST['productId']] = $_POST['product'];

if ($_POST['productsStock'] > 1) {

    $req = $pdo->prepare("UPDATE Products SET productsStock = ? WHERE productsName = ?");

    $req->execute([$_POST['productsStock'] - 1, $_POST['product']]);

} else if ($_POST['productsStock'] === 1) {

    $req = $pdo->prepare("UPDATE Products SET productsStock = ? WHERE productsStock = ?");

    $req->execute([$_POST['productsStock'] - 1, $_POST['productsStock']]);

    $response['error'] = "error_stock";

    echo json_encode($response);

}
