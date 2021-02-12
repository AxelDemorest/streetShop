<?php

session_start();

require "../../database/database.php";

foreach ($_SESSION['panier'] as $key => $value) {

    $req = $pdo->prepare("UPDATE Products SET productsStock = productsStock + ? WHERE productsId = ?");

    $req->execute([$_SESSION['panierQuantity'][$key], $key]);

}

unset($_SESSION['panier']);

unset($_SESSION['panierQuantity']);