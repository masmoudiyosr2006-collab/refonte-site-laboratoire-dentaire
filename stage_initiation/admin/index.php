<?php
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="admin-panel">
<div class="admin-header">
    <h1>Bienvenue <?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
    <a href="../logout.php">Déconnexion</a>
</div>
<div class="admin-menu">
    <div class="admin-card">
        <h3>Lab Team</h3>
        <a href="labteam.php" class="admin-btn">Gérer</a>
    </div>
    <div class="admin-card">
        <h3>Gérer les recrutements</h3>
        <a href="recrutement.php" class="admin-btn">Accéder</a>
    </div>
    <div class="admin-card">
        <h3>Gérer Contacts</h3>
        <p>Consulter et gérer les messages reçus</p>
        <a href="contacts.php" class="admin-btn">Accéder</a>
    </div>
</div>
</div>
</body>
</html>
