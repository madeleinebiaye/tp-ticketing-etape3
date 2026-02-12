<?php
session_start();

// Initialisation si vide
if (!isset($_SESSION["tickets"])) {
    $_SESSION["tickets"] = [];
}

$tickets = $_SESSION["tickets"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tickets | TP Ticketing</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header class="main-header"
        style="position: fixed; top: 0; left: 0; right: 0; background-color: #2c7be5; z-index: 1000;">
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
            <a href="ticket-create.php">Créer un ticket</a>
            <a href="project-create.php">Créer un projet</a>
            <a href="profile.php">Profil</a>
            <a href="settings.php">Paramètres</a>
            <a href="index.php">Déconnexion</a>
        </nav>
    </div>
</header>

<main class="tickets" style="margin-top:100px;">

<div class="tickets-header">
    <h1 class="tickets-title">Gestion des tickets</h1>
</div>

<table class="tickets-table">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Statut</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

    <?php if (empty($tickets)) : ?>
        <tr>
            <td colspan="4">Aucun ticket créé pour le moment.</td>
        </tr>
    <?php else : ?>

        <?php foreach ($tickets as $index => $ticket) : ?>
            <tr>
                <td><?= $ticket["title"] ?></td>
                <td><?= $ticket["status"] ?></td>
                <td><?= $ticket["type"] ?></td>
                <td>
                    <a href="ticket-detail.php?id=<?= $index ?>">
                        Voir détail
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>

    <?php endif; ?>

    </tbody>
</table>

</main>

</body>
</html>