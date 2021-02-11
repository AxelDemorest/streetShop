<?php

session_start();

require_once '../../database/database.php';

?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="admin.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../../website_part/header.css">
    <title>Administration</title>
</head>
<body class="pb-5">

<div id = side_bar>
<a class="nav-link text-dark" href="http://localhost:8888/streetShop/public/home/home.php">Accueil</a>

<a class="nav-link text-dark" href=""> Déconnexion</a>
                        
</div>
    <div id = fond>
        <h1 class="pm-text">Administrateur</h1>
<div id = table>
    <button>Add</button><br>
        <?php
    $test = $pdo->query("SELECT * FROM Users ");
    while($recup = $test->fetch(PDO::FETCH_ASSOC)){
        echo $recup['firstName']. " . " .$recup['email'];
        ?>
        <button><a href= supp_admin.php?id="$recup[0]">Delete</a></button>
        <?php
        echo("  <button>Edit</button>");
        echo("<br>");
        echo("<br>");
        
    }
?>
</div>


    </div>
</body>
</html>