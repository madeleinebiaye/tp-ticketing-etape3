<?php
// =============================
// DONNÉES UTILISATEUR (SIMULATION)
// =============================

// Simulation d’un utilisateur connecté
$userName = "Alice Martin";
$userEmail = "alice.martin@email.com";
$userRole = "Collaborateur";

// Sécurisation minimale
$userName = htmlspecialchars($userName);
$userEmail = htmlspecialchars($userEmail);
$userRole = htmlspecialchars($userRole);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil utilisateur | TP Ticketing</title>
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

    <h1>Profil utilisateur</h1>

    <section class="ticket-info">
        <p><strong>Nom :</strong> <?= $userName ?></p>
        <p><strong>Email :</strong> <?= $userEmail ?></p>
        <p><strong>Rôle :</strong> <?= $userRole ?></p>
    </section>

</main>

</body>
</html>