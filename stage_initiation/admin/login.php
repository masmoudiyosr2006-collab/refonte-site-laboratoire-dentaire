<?php
session_start();
require_once "../config/db.php";
$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && $password==$admin["password"]) {
        $_SESSION["admin"] = true;
        $_SESSION["username"] = $admin["username"];
        header("Location: index.php");
        exit;
    } else {
        $error = "Username ou mot de passe incorrect";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="admin.css">

</head>
<body>
<?php if ($error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php endif; ?>
<div class="admin-login">
    <h2 class="login-title">Connexion Admin</h2>

<form method="post">
    <input type="text" name="username" placeholder="Username" required>
    <br><br>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <br><br>
    <button type="submit">Se connecter</button>
</form>
</div>
</body>
</html>
