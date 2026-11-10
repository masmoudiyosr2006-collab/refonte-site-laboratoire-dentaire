<?php
include "config/db.php";
$sql = "SELECT * FROM employes";
$stmt = $pdo->query($sql);
$employes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<?php include "meta.php"; ?>
<body>
<?php include "header.php"; ?>
<section class="employes">
    <h1>Notre équipe</h1>
    <div class="employes-container">
        <?php foreach ($employes as $emp): ?>
            <div class="employe-card">
                <img src="uploads/labteam/<?= htmlspecialchars($emp['photo']) ?>" alt="">

                <h3><?php echo htmlspecialchars($emp['prenom'] . " " . $emp['nom']); ?></h3>
                <p><?php echo htmlspecialchars($emp['poste']); ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php include "footer.php"; ?>
</body>
</html>
