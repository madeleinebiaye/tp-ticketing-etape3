<?php

require_once "config/database.php";

$sql = "SELECT * FROM users";

$stmt = $pdo->query($sql);

$users = $stmt->fetchAll();

foreach($users as $user){

echo $user['name']."<br>";

}