<?php
session_start();

// Vérifier que des tickets existent
if (!isset($_SESSION["tickets"])) {
    $_SESSION["tickets"] = [];
}

// Récupérer l'ID depuis l'URL
$id = $_GET["id"] ?? null;

// Vérification
if ($id === null || !isset($_SESSION["tickets"][$id])) {
    $ticket = null;
} else {
    $ticket = $_SESSION["tickets"][$id];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du ticket | TP Ticketing</title>
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

<main class="ticket-detail" style="margin-top:100px;">

<?php if ($ticket === null): ?>

    <h1>Ticket introuvable</h1>
    <p>Le ticket demandé n’existe pas.</p>

<?php else: ?>

    <h1>Détail du ticket</h1>

    <section class="ticket-info">
        <p><strong>Titre :</strong> <?= $ticket["title"] ?></p>
        <p><strong>Statut :</strong> <?= $ticket["status"] ?></p>
        <p><strong>Type :</strong> <?= $ticket["type"] ?></p>
        <p><strong>Priorité :</strong> <?= $ticket["priority"] ?></p>
    </section>

    <section class="ticket-description">
        <h2>Description</h2>
        <p><?= $ticket["description"] ?></p>
    </section>

    <section class="ticket-time">
        <h2>Temps</h2>
        <p>Temps estimé : <?= $ticket["estimated_time"] ?> h</p>
        <p>Temps réel : <?= $ticket["spent_time"] ?> h</p>
    </section>

    <section class="ticket-time">
        <h2>Collaborateurs</h2>
        <ul>
            <?php foreach ($ticket["collaborators"] as $collab): ?>
                <li><?= $collab ?></li>
            <?php endforeach; ?>
        </ul>
    </section>

<?php endif; ?>

</main>

</body>
</html>