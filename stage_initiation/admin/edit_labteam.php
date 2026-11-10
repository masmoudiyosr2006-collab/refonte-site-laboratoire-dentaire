<?php
include "protect.php";
include "../config/db.php";
if (!isset($_GET["id"])) {
    header("Location: labteam.php");
    exit;
}
$id = (int) $_GET["id"];
$stmt = $pdo->prepare("SELECT * FROM employes WHERE id = ?");
$stmt->execute([$id]);
$emp = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$emp) {
    header("Location: labteam.php");
    exit;
}

if (isset($_POST["update"])) {
    $nom    = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $poste  = $_POST["poste"];
    if (!empty($_FILES["photo"]["name"])) {
        $photoName = time() . "_" . $_FILES["photo"]["name"];
        $target = "../uploads/labteam/" . $photoName;
        if (!is_dir("../uploads/labteam")) {
            mkdir("../uploads/labteam", 0777, true);
        }
        move_uploaded_file($_FILES["photo"]["tmp_name"], $target);
    } else {
        $photoName = $emp["photo"];
    }
    $sql = "UPDATE employes
            SET nom = ?, prenom = ?, poste = ?, photo = ?
            WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nom, $prenom, $poste, $photoName, $id]);
    header("Location: labteam.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier Employé</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="admin-login">
    <h1>Modifier Employé</h1>
    <form method="post" enctype="multipart/form-data">
        <label>Nom</label>
        <input type="text" name="nom" value="<?= htmlspecialchars($emp["nom"]) ?>" required>
        <label>Prénom</label>
        <input type="text" name="prenom" value="<?= htmlspecialchars($emp["prenom"]) ?>" required>
        <label>Poste</label>
        <input type="text" name="poste" value="<?= htmlspecialchars($emp["poste"]) ?>" required>
        <label>Photo actuelle</label><br>
        <?php if (!empty($emp["photo"])): ?>
            <img src="../uploads/labteam/<?= htmlspecialchars($emp["photo"]) ?>" style="width:120px;border-radius:8px">
        <?php else: ?>
            <p>Aucune photo</p>
        <?php endif; ?>
        <br><br>
        <label>Changer la photo (optionnel)</label>
        <input type="file" name="photo">
        <button type="submit" name="update">Mettre à jour</button>
        <a href="labteam.php" style="display:block;margin-top:10px;">⬅ Retour</a>
    </form>
</div>
</body>
</html>
