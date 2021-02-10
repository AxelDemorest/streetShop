<?php

session_start();

array_push($_SESSION['panier'], $_POST['product']);
