<?php

require "../../database/database.php";

$req = $pdo->prepare("DELETE FROM Categories WHERE categoriesId = ?");

$req->execute([$_POST['categoryId']]);