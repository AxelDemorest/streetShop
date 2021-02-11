<?php

require "../../database/database.php";

$req = $pdo->prepare("DELETE FROM Products WHERE productsId = ?");

$req->execute([$_POST['productId']]);