<?php
include "../config/db.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: contacts.php");
    exit;
}
$id = (int) $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM contact WHERE id = ?");
$stmt->execute([$id]);
header("Location: contacts.php");
exit;
