<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {


$dsn = 'mysql:host=localhost;dbname=labo;charset=utf8';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Echec de la connexion : ' . $e->getMessage();
    exit;
}



    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    
    $cv_name = '';

    if (isset($_FILES['cv']) && $_FILES['cv']['error'] == 0) {
        $upload_dir = 'uploads_cv/'; 
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $cv_name = time() . "_" . basename($_FILES['cv']['name']);
        $cv_path = $upload_dir . $cv_name;
        move_uploaded_file($_FILES['cv']['tmp_name'], $cv_path);
    }

    $fp = fopen("candidatures.txt", 'a+');
    if ($fp) {
        fputs($fp, "------------------------\n");
        fputs($fp, "Date : " . date("Y-m-d H:i:s") . "\n");
        fputs($fp, "Nom : " . $nom . "\n");
        fputs($fp, "Prénom : " . $prenom . "\n");
        fputs($fp, "Email : " . $email . "\n");
        fputs($fp, "CV : " . $cv_name . "\n\n");
        fclose($fp);


$sql = "INSERT INTO recrutement (nom, prenom, mail, cv) VALUES (:nom, :prenom, :email, :cv_name)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':cv_name', $cv_name);

if ($stmt->execute()) {
    echo 'Insertion réussie !';
} else {
    echo "Echec de l'insertion.";
}


        $confirmation = "Votre candidature a été envoyée avec succès !";
    } else {
        $confirmation = "Erreur : impossible d'enregistrer votre candidature.";
    }
} else {
    $confirmation = "Aucune donnée reçue.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<?php include "meta.php"; ?>

<body>
<?php include "header.php"; ?>
<section class="recrutement">
    <h1>Formulaire de candidature</h1>
    <p><?php echo $confirmation; ?></p>
</section>
<?php include "footer.php"; ?>
</body>
</html>
