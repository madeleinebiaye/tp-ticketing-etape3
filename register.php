<?php
// =============================
// TRAITEMENT FORMULAIRE INSCRIPTION
// =============================

$message = "";
$messageType = ""; // success ou error

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = htmlspecialchars(trim($_POST["email"] ?? ""));
    $password = htmlspecialchars(trim($_POST["password"] ?? ""));
    $confirmPassword = htmlspecialchars(trim($_POST["confirm_password"] ?? ""));

    // Validation
    if (empty($email) || empty($password) || empty($confirmPassword)) {
        $message = "Tous les champs sont obligatoires.";
        $messageType = "error";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Adresse email invalide.";
        $messageType = "error";
    } elseif ($password !== $confirmPassword) {
        $message = "Les mots de passe ne correspondent pas.";
        $messageType = "error";
    } else {
        // Simulation création utilisateur
        $message = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
        $messageType = "success";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription | TP Ticketing</title>
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

    <h1>Inscription</h1>

    <form method="POST" class="ticket-form">

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
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirmer le mot de passe</label>
            <input type="password" name="confirm_password" id="confirm_password" required>
        </div>

        <button type="submit">S’inscrire</button>

    </form>

</main>

</body>
</html>