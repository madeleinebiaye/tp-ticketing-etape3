<?php
// =============================
// SIMULATION LISTE DES PROJETS
// =============================

$projects = [
    [
        "title" => "Site vitrine",
        "client" => "Client A",
        "collaborators" => "Alice, Bob",
        "hours_remaining" => 12,
        "progress" => 60,
        "status" => "Actif"
    ],
    [
        "title" => "Application interne",
        "client" => "Client B",
        "collaborators" => "Claire",
        "hours_remaining" => 6,
        "progress" => 30,
        "status" => "À surveiller"
    ],
    [
        "title" => "Plateforme e-commerce",
        "client" => "Client C",
        "collaborators" => "David, Emma",
        "hours_remaining" => 20,
        "progress" => 75,
        "status" => "Actif"
    ],
    [
        "title" => "Maintenance serveur",
        "client" => "Client D",
        "collaborators" => "Lucas",
        "hours_remaining" => 4,
        "progress" => 20,
        "status" => "À surveiller"
    ],
    [
        "title" => "Refonte UX mobile",
        "client" => "Client E",
        "collaborators" => "Sarah, Tom",
        "hours_remaining" => 9,
        "progress" => 45,
        "status" => "Actif"
    ],
    [
        "title" => "API interne",
        "client" => "Client F",
        "collaborators" => "Kevin",
        "hours_remaining" => 14,
        "progress" => 60,
        "status" => "Actif"
    ]
];

// Sécurisation minimale
foreach ($projects as &$project) {
    foreach ($project as $key => $value) {
        $project[$key] = htmlspecialchars($value);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Projets | TP Ticketing</title>
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

<main class="projects" style="margin-top:100px;">

    <h1 class="page-title">Projets clients</h1>
    <p class="page-subtitle">
        Vue d’ensemble des projets, des clients associés et de l’état des contrats.
    </p>

    <section class="projects-grid">

        <?php foreach ($projects as $project) : ?>

            <div class="project-card">

                <div class="project-header">
                    <h2><?= $project["title"] ?></h2>

                    <span class="badge <?= $project["status"] === "Actif" ? "active" : "warning" ?>">
                        <?= $project["status"] ?>
                    </span>
                </div>

                <p class="project-client">
                    Client : <strong><?= $project["client"] ?></strong>
                </p>

                <p class="project-collab">
                    Collaborateurs : <?= $project["collaborators"] ?>
                </p>

                <div class="hours">
                    <span>Heures restantes : <?= $project["hours_remaining"] ?>h</span>

                    <div class="progress">
                        <div class="progress-fill 
                            <?= $project["progress"] <= 30 ? "danger" : "" ?>"
                            style="width: <?= $project["progress"] ?>%;">
                        </div>
                    </div>
                </div>

                <div class="project-actions">
                    <a href="project-detail.php" class="btn-link">
                        Voir les détails du projet
                    </a>
                </div>

            </div>

        <?php endforeach; ?>

    </section>

</main>

</body>
</html>