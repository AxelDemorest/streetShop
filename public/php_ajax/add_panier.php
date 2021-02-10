<?php

session_start();

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}

$_SESSION['panier'][$_POST['productId']] = $_POST['product'];
