<?php
// =============================
// TRAITEMENT FORMULAIRE PROJET
// =============================

$message = "";
$messageType = ""; // success ou error

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Sécurisation minimale
    $title = htmlspecialchars(trim($_POST["title"] ?? ""));
    $description = htmlspecialchars(trim($_POST["description"] ?? ""));
    $status = htmlspecialchars(trim($_POST["status"] ?? ""));
    $priority = htmlspecialchars(trim($_POST["priority"] ?? ""));
    $type = htmlspecialchars(trim($_POST["type"] ?? ""));
    $estimated_time = htmlspecialchars(trim($_POST["estimated_time"] ?? ""));
    $spent_time = htmlspecialchars(trim($_POST["spent_time"] ?? ""));

    // Validation minimale
    if (empty($title) || empty($description)) {
        $message = "Tous les champs obligatoires doivent être remplis.";
        $messageType = "error";
    } else {
        $message = "Projet créé avec succès !";
        $messageType = "success";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un projet | TP Ticketing</title>
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

<main class="ticket-create" style="margin-top:100px;">

<div class="ticket-layout">

    <form method="POST" class="ticket-form">

        <h1>Créer un projet</h1>

        <!-- MESSAGE PHP -->
        <?php if (!empty($message)) : ?>
            <div style="
                margin-bottom:1rem;
                padding:0.8rem;
                border-radius:6px;
                color:white;
                background-color: <?= $messageType === 'success' ? '#22c55e' : '#ef4444' ?>;
            ">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="status">Statut</label>
            <select id="status" name="status">
                <option>Nouveau</option>
                <option>En cours</option>
                <option>Terminé</option>
            </select>
        </div>

        <div class="form-group">
            <label for="priority">Priorité</label>
            <select id="priority" name="priority">
                <option>Basse</option>
                <option>Moyenne</option>
                <option>Haute</option>
            </select>
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select id="type" name="type">
                <option>Interne</option>
                <option>Client</option>
            </select>
        </div>

        <div class="form-group">
            <label for="estimated_time">Temps estimé</label>
            <input type="number" id="estimated_time" name="estimated_time" min="0">
        </div>

        <div class="form-group">
            <label for="spent_time">Temps réel passé</label>
            <input type="number" id="spent_time" name="spent_time" min="0">
        </div>

        <div class="form-group">
            <label for="collaborators">Collaborateurs</label>
            <select id="collaborators" name="collaborators[]" multiple>
                <option>Madeleine Biaye</option>
                <option>Jean Dupont</option>
                <option>Marie Martin</option>
                <option>Paul Durand</option>
            </select>
        </div>

        <button type="submit">Créer le projet</button>

    </form>

    <aside class="ticket-info-box">
        <img src="assets/image de projet.jpg" alt="Illustration projet">
        <h2>À quoi sert un projet ?</h2>
        <p>Un projet regroupe plusieurs tickets et organise le travail autour d’un client ou d’un objectif précis.</p>
        <p>Il permet de structurer les demandes et suivre les performances globales.</p>
    </aside>

</div>

</main>

</body>
</html>