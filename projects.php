<?php
session_start();
require_once "config/database.php";

// Récupération des projets depuis la base de données
$stmt = $pdo->query("
    SELECT projects.*, clients.company_name
    FROM projects
    JOIN clients ON projects.client_id = clients.id
");

$projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
        Vue d’ensemble des projets et des clients associés.
    </p>

    <section class="projects-grid">

        <?php if (empty($projects)) : ?>
            <p>Aucun projet enregistré pour le moment.</p>
        <?php else : ?>

            <?php foreach ($projects as $project) : ?>

                <div class="project-card">

                    <div class="project-header">
                        <h2><?= htmlspecialchars($project["name"]) ?></h2>

                        <span class="badge active">
                            Actif
                        </span>
                    </div>

                    <p class="project-client">
                        Client : 
                        <strong><?= htmlspecialchars($project["company_name"]) ?></strong>
                    </p>

                    <p class="project-collab">
                        Collaborateurs : Équipe interne
                    </p>

                    <div class="hours">
                        <span>Heures restantes : --</span>

                        <div class="progress">
                            <div class="progress-fill" style="width:50%;"></div>
                        </div>
                    </div>

                    <div class="project-actions">
                        <a href="project-detail.php?id=<?= $project['id'] ?>" class="btn-link">
                            Voir les détails du projet
                        </a>
                    </div>

                </div>

            <?php endforeach; ?>

        <?php endif; ?>

    </section>

</main>

</body>
</html>