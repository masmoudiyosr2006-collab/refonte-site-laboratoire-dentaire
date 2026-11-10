<?php
include "../config/db.php";
$sql = "SELECT * FROM recrutement ORDER BY id DESC";
$stmt = $pdo->query($sql);
$candidats = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Employé</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php include "admin_header.php"; ?>
<main class="admin-main">
<section class="admin-recrutement">
    <h1>Candidatures reçues</h1>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>CV</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($candidats as $c): ?>
                <tr>
                    <td><?= htmlspecialchars($c['nom']) ?></td>
                    <td><?= htmlspecialchars($c['prenom']) ?></td>
                    <td><?= htmlspecialchars($c['mail']) ?></td>
                    <td>
                        <a href="../uploads_cv/<?= htmlspecialchars($c['cv']) ?>" target="_blank">
                            Télécharger
                        </a>
                    </td>
                    <td>
                        <a href="delete_recrutement.php?id=<?= $c['id'] ?>" 
                           onclick="return confirm('Supprimer cette candidature ?')">
                           Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
  </main>
</body>
</html>
