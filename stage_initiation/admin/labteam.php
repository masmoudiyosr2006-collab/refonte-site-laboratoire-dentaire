<?php
include "protect.php";
include "../config/db.php";
if (isset($_POST["add"])) {
    $nom    = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $poste  = $_POST["poste"];
    $photoName = null;
    if (!empty($_FILES["photo"]["name"])) {
        if (!is_dir("../uploads/labteam")) {
            mkdir("../uploads/labteam", 0777, true);
        }
        $photoName = time() . "_" . $_FILES["photo"]["name"];
        $target = "../uploads/labteam/" . $photoName;
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target);
    }
    $sql = "INSERT INTO employes (nom, prenom, poste, photo)
            VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $poste, $photoName]);
}
$employees = $pdo->query("SELECT * FROM employes ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion Lab Team</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<?php include "admin_header.php"; ?>
<main class="admin-main">
<div class="admin-panel">
    <h1>Gestion Lab Team</h1>
    <p>Ajouter, modifier ou supprimer les employés du laboratoire</p>
    <form method="post" enctype="multipart/form-data" class="admin-login">
        <h1>Ajouter un employé</h1>
        <label>Nom</label>
        <input type="text" name="nom" required>
        <label>Prénom</label>
        <input type="text" name="prenom" required>
        <label>Poste</label>
        <input type="text" name="poste" required>
        <label>Photo</label>
        <input type="file" name="photo">
        <button type="submit" name="add">Ajouter</button>
    </form>
    <br><br>
    <div class="admin-menu">
        <?php foreach ($employees as $e): ?>
        <div class="admin-card">
            <?php if ($e["photo"]): ?>
                <img src="../uploads/labteam/<?= htmlspecialchars($e["photo"]) ?>" style="width:100%;border-radius:10px">
            <?php endif; ?>
            <h3><?= htmlspecialchars($e["nom"]) ?> <?= htmlspecialchars($e["prenom"]) ?></h3>
            <p><?= htmlspecialchars($e["poste"]) ?></p>
            <a href="edit_labteam.php?id=<?= $e["id"] ?>">Modifier</a>
            <a href="delete_labteam.php?id=<?= $e["id"] ?>"
               onclick="return confirm('Supprimer cet employé ?')"
               style="background:#b30000;margin-left:5px;">
               Supprimer
            </a>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="logout">
        <a href="login.php">Déconnexion</a>
    </div>
</div>
</main>
</body>
</html>
