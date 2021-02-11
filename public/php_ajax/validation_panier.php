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
    INSERT INTO OrdersLines(productsId,ordersId)
    VALUES (?, ?)
    ");
    
    $req2->execute([$key, $fetchOrder['ordersId']]);
}

unset($_SESSION['panier']);