<?php

session_start();

require "../../database/database.php";

$req = $pdo->prepare("
INSERT INTO Orders(usersId)
VALUES (?)
");

$req->execute([$_SESSION['auth']->usersId]);

$reqSelectOrder = $pdo->prepare("SELECT ordersId FROM Orders WHERE usersId = ? ORDER BY ordersDate DESC LIMIT 1");

$reqSelectOrder->execute([$_SESSION['auth']->usersId]);

$fetchOrder = $reqSelectOrder->fetch(PDO::FETCH_ASSOC);

foreach ($_SESSION['panier'] as $key => $value) {

    $req2 = $pdo->prepare("
    INSERT INTO OrdersLines(quantity,productsId,ordersId)
    VALUES (?, ?, ?)
    ");
    
    $req2->execute([$_SESSION['panierQuantity'][$key], $key, $fetchOrder['ordersId']]);

    $req = $pdo->prepare("UPDATE Products SET productsStock = productsStock + ? WHERE productsId = ?");

    $req->execute([$_SESSION['panierQuantity'][$key], $key]);
}

unset($_SESSION['panier']);

unset($_SESSION['panierQuantity']);
