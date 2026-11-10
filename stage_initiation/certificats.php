<!DOCTYPE html>
<html lang="fr">
<?php include "meta.php"; ?>
<body>
<?php include "header.php"; ?>
<section class="certificats" id="certificats">
    <h1>Notre galerie de certificats</h1>
    <div class="tabs">
        <button class="tab-btn active" data-tab="iso">ISO</button>
        <button class="tab-btn" data-tab="nationales">Nationales</button>
        <button class="tab-btn" data-tab="internationales">Internationales</button>
    </div>
    <div class="tab-content active" id="iso">
        <h2>ISO 9001</h2>
        <p>En Octobre 2016, notre laboratoire c est fait certifié en ISO 9001 version 2015 pour être le premier et le seul laboratoire de prothèse dentaire
             certifié ISO dans son secteur en Tunisie. Cette certification, fixe nos modalité par être plus sure et compétitif et prêt pour des nouvelles opportunités 
             sur le marché international
        </p>
        <h2>Nos isos</h2>
        <p>Nous installons notre système de mangement selon les deux référentiels internationaux ISO 9001 V 2015 et ISO 13485 V 2008 afin de réaliser notre
             politique et ses objectifs de qualités en matière de fabrication des dispositifs médicaux sur mesure qui satisfaites notre clientèle.
        </p>
        <ul>
            <li>ISO 9001 V2015 – Sousse</li>
            <li>OHSAS 18001 V2007 – Djerba</li>
            <li>ISO 9001 V2008 – Djerba</li>
        </ul>
        <div class="gallery">
            <img src="image/certificats/FORMATION-ISO-19011-2011-R.jpg">
            <img src="image/certificats/ISO-9001-2008-H-FIG3.jpg">
            <img src="image/certificats/ISO-19011-2011-H-FIG1.jpg">
            <img src="image/certificats/OHSAS18001V2007.jpg">
        </div>
    </div>
    <div class="tab-content" id="nationales">
        <h2>Nationales</h2>
        <ul>
            <li>Certificat " Prothèse sur implant " Djerba-Tunisie Du 14 au 15-01-2016</li>
            <li>Certificat "TRACE ANTI-BRIBERY " Zarzis-Tunisie 15-05-2014</li>
            <li>Certificat "ZIRCONE de A à Z rO2" Tunis-Tunisie 08-05-2015</li>
        </ul>
        <div class="gallery">
            <img src="image/certificats/CERTIFICATZIRCON.jpg">
            <img src="image/certificats/FORMATION PROTHESE IMPLANT.jpg">
            <img src="image/certificats/ISO-18001-2007-H-FIG2.jpg">
        </div>
    </div>
    <div class="tab-content" id="internationales">
        <h2>Internationales</h2>
        <ul>
            <li>Certificat " LOVE " Hanau-Allemagne Du 02 au 03-06-2015</li>
            <li>Certificat " VITAPM R 9 "  Bad Sackingen - Allemagne Du 26 au 27-04-2011</li>
            <li>Certificat " VITA VMK Master R-Individuel "  Bad Sackingen - Allemagne Du 28 au 29-04-2011</li>
            <li>Certificat " LOVE " Cours avancés :   Hanau-Allemagne Du 12 au 14-12-2011</li>
            <li>Certificat " Ivolar vivadent " Istanbul -Turki : Du 11 au 15-03-2012 </li>
            <li>Certificat " RHEIN83 "  Italie Du 17 au 19-06-2012</li>
        </ul>
        <div class="gallery">
            <img src="image/certificats/FORMATION- VITA-VMK Master-FIG10.jpg">
            <img src="image/certificats/FORMATION-IVOLAR-VIVADENT-FIG12.jpg">
            <img src="image/certificats/FORMATION-LOVE-ADVANCED-FIG11.jpg">
            <img src="image/certificats/FORMATION-RHEIN83-FIG13.jpg">
            <img src="image/certificats/FORMATION-VITA-PM-R9-FIG9.jpg" >
            <img src="image/certificats/FORMATION-CERCON-FIG8.jpg" >
        </div>
    </div>
</section>
<?php include "footer.php"; ?>
<script>
const buttons = document.querySelectorAll(".tab-btn");
const contents = document.querySelectorAll(".tab-content");

buttons.forEach(btn => {
    btn.addEventListener("click", () => {
        buttons.forEach(b => b.classList.remove("active"));
        contents.forEach(c => c.classList.remove("active"));

        btn.classList.add("active");
        document.getElementById(btn.dataset.tab).classList.add("active");

        document.getElementById("certificats")
            .scrollIntoView({ behavior: "smooth" });
    });
});
</script>
</body>
</html>