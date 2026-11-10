<?php
include "../config/db.php";
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $stmt = $pdo->prepare("SELECT cv FROM recrutement WHERE id = ?");
    $stmt->execute([$id]);
    $data = $stmt->fetch();
    if ($data) {
        $cv_path = "../uploads_cv/" . $data['cv'];
        if (file_exists($cv_path)) {
            unlink($cv_path);
        }
        $delete = $pdo->prepare("DELETE FROM recrutement WHERE id = ?");
        $delete->execute([$id]);
    }
}
header("Location: recrutement.php");
exit;
