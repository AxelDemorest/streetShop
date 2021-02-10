<?php
session_start();
require_once '../../database/database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../../website_part/header.css">
    <title>Panier - StreetShop</title>
</head>

<body>
    <?php 
    require "../../website_part/header.php";
   
    if (isset($_SESSION['panier'])){
    
    $tablPanier = $_SESSION['panier'];
    $taille = count($tablPanier);
    for ($i=0; $i < $taille; $i++){

    ?>

    <div class="card-body d-flex flex-column justify-content-end">
        <h5 class="card-title text-center"><?php echo $tablPanier[$i]; ?></h5>
    </div>
    
    <?php 
    }
    }
    ?>
</body>
</html>


