<!DOCTYPE html>
<html lang="fr">
<?php include "meta.php"; ?>
<body>
<?php include "header.php"; ?>
<section class="recrutement">
    <h1>Formulaire de candidature</h1>
   <form action="save_recrutement.php" method="post" enctype="multipart/form-data">
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>
    <label for="email">Adresse e-mail</label>
    <input type="email" id="email" name="email" placeholder="exemple@email.com" required>
    <label for="cv">Déposez votre CV</label>
    <input type="file" id="cv" name="cv" accept=".pdf,.doc,.docx" required>
    <button type="submit">Envoyer ma candidature</button>
</form>
</section>
<?php include "footer.php"; ?>  
</body>
</html>