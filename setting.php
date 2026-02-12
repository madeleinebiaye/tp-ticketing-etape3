<?php
// =============================
// SIMULATION DONNÉES UTILISATEUR
// =============================

$user = [
    "name" => "Madeleine Biaye",
    "email" => "madeleine@email.com",
    "role" => "Collaborateur",
    "language" => "Français",
    "timezone" => "Europe / Paris"
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Paramètres | TP Ticketing</title>
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

<main class="dashboard" style="margin-top: 100px;">

    <h1 class="page-title">Paramètres</h1>
    <p class="page-subtitle">
        Configurez votre compte et vos préférences d’utilisation.
    </p>

    <!-- SECTION COMPTE -->
    <section class="panel">
        <h3>Informations du compte</h3>
        <p><strong>Nom :</strong> <?= htmlspecialchars($user["name"]) ?></p>
        <p><strong>Email :</strong> <?= htmlspecialchars($user["email"]) ?></p>
        <p><strong>Rôle :</strong> <?= htmlspecialchars($user["role"]) ?></p>
    </section>

    <!-- SECTION PRÉFÉRENCES -->
    <section class="panel">
        <h3>Préférences</h3>
        <p>Langue : <?= htmlspecialchars($user["language"]) ?></p>
        <p>Fuseau horaire : <?= htmlspecialchars($user["timezone"]) ?></p>
    </section>

    <!-- SECTION SÉCURITÉ -->
    <section class="panel">
        <h3>Sécurité</h3>
        <p>Mot de passe : ********</p>
        <p>
            <em>La gestion du mot de passe sera implémentée ultérieurement.</em>
        </p>
    </section>

</main>

</body>
</html>