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


    $fp = fopen("test.txt", 'a+');

    if ($fp) {
     
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $sujet_liste = isset($_POST['sujet_liste']) ? $_POST['sujet_liste'] : '';
        $message = isset($_POST['message']) ? $_POST['message'] : '';

        fputs($fp, "------------------------\n");
        fputs($fp, "Date : " . date("Y-m-d H:i:s") . "\n");
        fputs($fp, "Nom : " . $nom . "\n");
        fputs($fp, "Prénom : " . $prenom . "\n");
        fputs($fp, "Email : " . $email . "\n");
        fputs($fp, "Sujet sélectionné : " . $sujet_liste . "\n");
        fputs($fp, "Message : " . $message . "\n\n");

        fclose($fp);




$sql = "INSERT INTO contact (nom, prenom, mail, sujet, sujet_autre) VALUES (:nom, :prenom, :email, :sujet_liste, :message)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nom', $nom);
$stmt->bindParam(':prenom', $prenom);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':sujet_liste', $sujet_liste);
$stmt->bindParam(':message', $message);


if ($stmt->execute()) {
    echo 'Insertion réussie !';
} else {
    echo "Echec de l'insertion.";
}

        $confirmation = "Votre demande est bien reçue ! Merci pour votre message.";
    } else {
        $confirmation = "Erreur : impossible d'ouvrir le fichier.";
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
<section class="contact">
    <h1>Contactez-nous</h1>
    <p><?php echo $confirmation; ?></p>
</section>
<?php include "footer.php"; ?>
</body>
</html>
