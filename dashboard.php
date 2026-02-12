<?php
session_start();

$tickets = $_SESSION["tickets"] ?? [];

$totalTickets = count($tickets);

$nbEnCours = 0;
$nbNouveau = 0;
$nbTermine = 0;

foreach ($tickets as $ticket) {
    if ($ticket["status"] === "En cours") {
        $nbEnCours++;
    }
    if ($ticket["status"] === "Nouveau") {
        $nbNouveau++;
    }
    if ($ticket["status"] === "Terminé") {
        $nbTermine++;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | TP Ticketing</title>
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

<main class="dashboard" style="margin-top: 100px; width: 100%;">

    <div class="dashboard-title-wrapper">
        <h1 class="dashboard-title">
            Tableau de bord de performance
        </h1>
    </div>

    <!-- KPI principaux -->
    <section class="kpi-grid">

        <div class="kpi-card">
            <span>Total tickets</span>
            <div style="font-size:2rem;font-weight:bold;">
                <?= $totalTickets ?>
            </div>
        </div>

        <div class="kpi-card">
            <span>Nouveaux</span>
            <div style="font-size:2rem;font-weight:bold;">
                <?= $nbNouveau ?>
            </div>
        </div>

        <div class="kpi-card">
            <span>En cours</span>
            <div style="font-size:2rem;font-weight:bold;">
                <?= $nbEnCours ?>
            </div>
        </div>

        <div class="kpi-card">
            <span>Terminés</span>
            <div style="font-size:2rem;font-weight:bold;">
                <?= $nbTermine ?>
            </div>
        </div>

    </section>

    <section class="dashboard-row">

        <div class="panel highlight">
            <h3>Tickets créés</h3>
            <p class="big-number"><?= $totalTickets ?></p>
        </div>

        <div class="panel">
            <h3>Statut des tickets</h3>

            <div class="status-row">
                <span>Nouveaux</span>
                <div class="bar">
                    <div class="bar-fill green"
                         style="width: <?= $totalTickets > 0 ? ($nbNouveau / $totalTickets) * 100 : 0 ?>%"></div>
                </div>
                <span><?= $nbNouveau ?></span>
            </div>

            <div class="status-row">
                <span>En cours</span>
                <div class="bar">
                    <div class="bar-fill blue"
                         style="width: <?= $totalTickets > 0 ? ($nbEnCours / $totalTickets) * 100 : 0 ?>%"></div>
                </div>
                <span><?= $nbEnCours ?></span>
            </div>

        </div>

        <div class="panel">
            <h3>Résumé</h3>
            <ul class="top-list">
                <li>Total tickets <span><?= $totalTickets ?></span></li>
                <li>En cours <span><?= $nbEnCours ?></span></li>
                <li>Terminés <span><?= $nbTermine ?></span></li>
            </ul>
        </div>

    </section>

</main>

</body>
</html>