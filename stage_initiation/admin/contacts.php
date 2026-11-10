<?php
include "../config/db.php";
$stmt = $pdo->query("SELECT * FROM contact ORDER BY id DESC");
$contacts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer Contacts</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php include "admin_header.php"; ?>
<main class="admin-main">
    <div class="admin-card">
        <h1>Messages de contact</h1>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Sujet</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($contacts) === 0): ?>
                    <tr>
                        <td colspan="6">Aucun message reçu</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($contacts as $c): ?>
                    <tr>
                        <td><?= htmlspecialchars($c['nom']) ?></td>
                        <td><?= htmlspecialchars($c['prenom']) ?></td>
                        <td><?= htmlspecialchars($c['mail']) ?></td>
                        <td><?= htmlspecialchars($c['sujet']) ?></td>
                        <td><?= htmlspecialchars($c['sujet_autre']) ?></td>
                        <td>
                            <a href="delete_contact.php?id=<?= $c['id'] ?>"
                               class="btn-delete"
                               onclick="return confirm('Supprimer ce message ?')">
                               Supprimer
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>
