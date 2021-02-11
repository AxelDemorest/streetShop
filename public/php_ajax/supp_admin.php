<?php
session_start();

require_once '../../database/database.php';

if(isset($_GET('id'))){

    include_once 'admin_acount.php'
    $id = htmlentities ($pdo->quote($_GET['id']));

    $delete = $pdo->query("DELETE FROM Users WHERE id=$id");
    if($delete){
        echo"Supprimer";
    }
    else{
        echo"ca marche pas"
    }


}
?>