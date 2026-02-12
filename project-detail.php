<?php
// =============================
// SIMULATION D’UN PROJET
// =============================

$project = [
    "title" => "Bug formulaire",
    "project" => "Site vitrine",
    "status" => "En cours",
    "type" => "Inclus",
    "priority" => "Moyenne",
    "description" => "Ce projet a pour objectif de fournir une solution numérique permettant de répondre à un besoin fonctionnel clairement identifié chez le client. Il s’inscrit dans un cadre contractuel précis, avec des contraintes de délais, de budget et de ressources humaines. Il regroupe plusieurs fonctionnalités techniques organisées via un système de tickets.",
    "time_spent" => "2h30"
];

// Sécurisation minimale
foreach ($project as $key => $value) {
    $project[$key] = htmlspecialchars($value);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail du projet | TP Ticketing</title>
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
            <a href="setting.php">Paramètres</a>
            <a href="index.php">Déconnexion</a>
        </nav>

    </div>
</header>

<main class="ticket-detail" style="margin-top:100px;">

    <h1>Détail du projet</h1>

    <!-- Informations générales -->
    <section class="ticket-info">
        <p><strong>Titre :</strong> <?= $project["title"] ?></p>
        <p><strong>Projet :</strong> <?= $project["project"] ?></p>
        <p><strong>Statut :</strong> <?= $project["status"] ?></p>
        <p><strong>Type :</strong> <?= $project["type"] ?></p>
        <p><strong>Priorité :</strong> <?= $project["priority"] ?></p>
    </section>

    <!-- Description -->
    <section class="ticket-description">
        <h2>Description</h2>
        <p><?= $project["description"] ?></p>
    </section>

    <!-- Temps passé -->
    <section class="ticket-time">
        <h2>Temps passé</h2>
        <p>Total : <?= $project["time_spent"] ?></p>
    </section>

</main>

</body>
</html>