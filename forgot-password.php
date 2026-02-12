<?php
// =============================
// TRAITEMENT FORMULAIRE RESET
// =============================

$message = "";
$messageType = ""; // success ou error

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = htmlspecialchars(trim($_POST["email"] ?? ""));

    if (empty($email)) {
        $message = "L'adresse email est obligatoire.";
        $messageType = "error";
    } else {
        // Simulation d’envoi d’email
        $message = "Un email de réinitialisation a été envoyé.";
        $messageType = "success";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mot de passe oublié | TP Ticketing</title>
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

    <h1>Mot de passe oublié</h1>

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
            <label for="email">Adresse email</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                placeholder="exemple@email.com"
                required
            >
        </div>

        <button type="submit">Réinitialiser</button>

    </form>

</main>

</body>
</html>