<?php
session_start();
require_once "config/database.php";

if (!isset($_GET['id'])) {
    die("Ticket non spécifié.");
}

$ticket_id = (int) $_GET['id'];

$stmt = $pdo->prepare("
    SELECT tickets.*, projects.name AS project_name
    FROM tickets
    JOIN projects ON tickets.project_id = projects.id
    WHERE tickets.id = ?
");

$stmt->execute([$ticket_id]);
$ticket = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$ticket) {
    die("Ticket introuvable.");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du ticket</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="main-header"
        style="position: fixed; top: 0; left: 0; right: 0; background-color: #2c7be5;">
    <div class="header-content">
        <div class="logo">
            <a href="index.php">
                <img src="assets/logo.png" alt="Logo">
            </a>
        </div>

        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="projects.php">Projets</a>
            <a href="tickets.php">Tickets</a>
        </nav>
    </div>
</header>

<main style="margin-top:100px; padding:20px;">

<h1>Détail du ticket</h1>

<div style="border:1px solid #ccc; padding:20px;">
    <h2><?= htmlspecialchars($ticket["title"]) ?></h2>

    <p><strong>Projet :</strong> <?= htmlspecialchars($ticket["project_name"]) ?></p>
    <p><strong>Description :</strong> <?= htmlspecialchars($ticket["description"]) ?></p>
    <p><strong>Statut :</strong> <?= htmlspecialchars($ticket["status"]) ?></p>
    <p><strong>Type :</strong> <?= htmlspecialchars($ticket["type"]) ?></p>
    <p><strong>Temps estimé :</strong> <?= htmlspecialchars($ticket["estimated_time"]) ?> h</p>
    <p><strong>Date création :</strong> <?= htmlspecialchars($ticket["created_at"]) ?></p>
</div>

<br>
<a href="tickets.php">⬅ Retour à la liste</a>

</main>

</body>
</html>