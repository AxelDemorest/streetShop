<?php

session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

$_SESSION['panier'][$_POST['productId']] = $_POST['product'];

$req = $pdo->prepare("
INSERT INTO Users(firstName,lastName,email,gender,password)
VALUES (?, ?, ?, ?, ?)
");

$password = password_hash($password, PASSWORD_BCRYPT);

$req->execute([$lastName, $firstName, $email, $_POST['genderRadios'], $password]);