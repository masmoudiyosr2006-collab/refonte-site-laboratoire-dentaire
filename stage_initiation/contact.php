<!DOCTYPE html>
<html lang="fr">
<?php include "meta.php"; ?>
<body>
<?php include "header.php"; ?>
<section class="contact">
    <h1>contactez nous </h1>
    <form action="save.php" method="post" enctype="multipart/form-data">
    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" placeholder="Votre nom" required>
    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom" placeholder="Votre prénom" required>
    <label for="email">Adresse e-mail</label>
    <input type="email" id="email" name="email" placeholder="exemple@email.com" required>
    <label for="sj">Sujet </label> 
    <input list="n" type="text" id="sj" name="sujet_liste"/> 
    <datalist id="n">
        <option value="Demande de devis"> </option>
        <option value="Info-commande"> </option>
        <option value="Nouveau Docteur"> </option>
        <option value="Formations"> </option>
        <option value="Emplois"> </option>
        <option value="Autre"> </option>
    </datalist>
    <label for="message">Tapez votre sujet ici...</label>
    <textarea id="message" name="message" required></textarea>
    <button type="submit">J'envoie</button>
</form>
</section>
<?php include "footer.php"; ?>    
</body>
</html>