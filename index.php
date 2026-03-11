<?php

session_start();
require_once "config/database.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if (empty($email) || empty($password)) {

        $message = "Veuillez remplir tous les champs.";

    } else {

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user["password"])) {

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_email"] = $user["email"];

            header("Location: dashboard.php");
            exit();

        } else {

            $message = "Email ou mot de passe incorrect.";

        }

    }

}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion | TP Ticketing</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color: #eaf2ff;">

<header class="main-header"
        style="position: fixed; top: 0; left: 0; right: 0; background-color: #2c7be5; z-index: 1000;">
    <div class="header-content">

        <!-- Logo -->
        <div class="logo">
            <a href="index.php">
                <img src="assets/logo.png" alt="Logo">
            </a>
        </div>

        <!-- Menu -->
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

<main style="
    min-height: calc(100vh - 80px);
    display: flex;
    margin-top: 80px;
">

    <!-- PANNEAU BLEU -->
    <section style="
        flex: 1;
        background: linear-gradient(135deg, #2c7be5, #2d7bd4);
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 3rem;
    ">
        <div style="max-width: 420px;">
            <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">
                Bienvenue 👋
            </h1>
            <p style="font-size: 1.1rem; line-height: 1.6; opacity: 0.95;">
                Accédez à votre espace de gestion des projets et tickets.
                Suivez l’avancement et gardez une vision claire.
            </p>
        </div>
    </section>

    <!-- CONNEXION -->
    <section style="
        flex: 1;
        background-color: #eaf2ff;
        display: flex;
        justify-content: center;
        align-items: center;
    ">
        <div style="
            background-color: white;
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            border-radius: 12px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.12);
        ">

            <h1 style="text-align: center; margin-bottom: 2rem; color: #2c7be5;">
                Connexion
            </h1>

            <!-- AFFICHAGE ERREUR -->
            <?php if (!empty($error)) : ?>
                <div style="color: red; margin-bottom: 1rem;">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <!-- AFFICHAGE SUCCÈS -->
            <?php if (!empty($success)) : ?>
                <div style="color: green; margin-bottom: 1rem;">
                    <?= $success ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="">

                <div class="form-group">
                    <label>Adresse email</label>
                    <input 
                        type="email" 
                        name="email"
                        placeholder="exemple@email.com"
                    >
                </div>

                <div class="form-group">
                    <label>Mot de passe</label>
                    <input 
                        type="password" 
                        name="password"
                        placeholder="Votre mot de passe"
                    >
                </div>

                <div class="forgot-password">
                    <a href="forgot-password.php">Mot de passe oublié ?</a>
                </div>

                <button type="submit" style="
                    width: 100%;
                    margin-top: 1.5rem;
                    padding: 0.8rem;
                    background-color: #2c7be5;
                    color: white;
                    border: none;
                    border-radius: 8px;
                    font-size: 1rem;
                    cursor: pointer;
                ">
                    Se connecter
                </button>

                <p style="
                    margin-top: 1.5rem;
                    text-align: center;
                    font-size: 0.9rem;
                    color: #475569;
                ">
                    Vous n’avez pas encore de compte ?
                    <a href="register.php" style="
                        color: #2c7be5;
                        font-weight: 600;
                        text-decoration: none;
                    ">
                        Inscrivez-vous
                    </a>
                </p>

            </form>

        </div>
    </section>

</main>

</body>
</html>
