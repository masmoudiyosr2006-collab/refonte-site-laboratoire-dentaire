<?php
include "protect.php";
include "../config/db.php";

$id = $_GET["id"];
$pdo->prepare("DELETE FROM employes WHERE id=?")->execute([$id]);

header("Location: labteam.php");
