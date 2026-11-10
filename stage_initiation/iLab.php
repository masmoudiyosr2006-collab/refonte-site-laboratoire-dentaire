<!DOCTYPE html>
<html lang="fr">
<?php include "meta.php"; ?>
<body>
<?php include "header.php"; ?>
<section class="ilab">
    <form class="cord">
        <h2>iLab</h2>
        <h3>Entrer votre identifiant pour accéder à votre Espace-Pro</h3>
        <label for="email">Adresse e-mail</label>
        <input type="email" id="email" name="email" placeholder="exemple@email.com" required>
        <br>
        <label for="password">Mot de Passe</label>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <br>
        <input id="show-password" type="checkbox" >
        <label for="show-password">Afficher Mot de Passe</label>
        <br>
        <button type="submit">J'envoie</button>
    </form>
    <div class="info">
        <h2>Bureau d'ordre</h2>
        <p> info-commande@labo-amine-chouch.com</p><br>
        <p>28 989 102 /    28 989 103 /    28 989 104 /    28 821 000</p><br>
        <h2>Commercial</h2><br>
        <p>commercial@labo-amine-chouch.com</p><br>
        <p>28 989 102 / 28 821 000</p>
    </div>
</section>
<?php include "footer.php"; ?>   
</body>
</html>