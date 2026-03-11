<?php

require_once "config/database.php";

$sql = "SELECT * FROM tickets";

$stmt = $pdo->query($sql);

$tickets = $stmt->fetchAll();

foreach($tickets as $ticket){

echo "<h3>".$ticket['title']."</h3>";
echo "<p>".$ticket['description']."</p>";

}