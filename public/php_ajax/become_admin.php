<?php

require "../../database/database.php";

$req = $pdo->prepare("UPDATE Users SET rank = 1 WHERE usersId = ?");

$req->execute([$_POST['userId']]);