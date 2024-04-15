<!DOCTYPE html>

<?php
include('connections.php');
session_start();
function isAdmin()
{
    return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === "admin";
}
$header_to_include = isAdmin() ? 'admin-header.php' : 'header.php';
include($header_to_include);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <title>Home</title>
</head>
<body>
    <main>
        <div class="container" id="ontdek">
            <h2 class="regular">
                Ontdek verfijnde <br>
                <span style="color:#f5743c">sushi</span> en de <span style="color:#f5743c">Aziatische</span> <br>
                <span style="color:#f5743c">cuisine</span> <br>
                <span style="font-size: 12pt;">Scroll</span><span style="font-size: 20pt" ;>↓</span>
            </h2>

            <img id="tree" src="assets/img/restaurant-rozeboom 1.png" alt="Foto Boom">
        </div>
        <div class="container" id="cuisine">
            <h2 class="regular" id="onze-cuisine">
                Onze 
                <br>
                cuisine
            </h2>
            <div id="menu-text">
                <p>
                    <span style="font-size: 1.6rem;"> <strong> Verse gerechten van de andere kant van de wereld </strong> </span><br>
                    <br>
                    Bij Restaurant Shusui in Venray draait alles om het proeven van de 
                    <br>
                    overheerlijke diversiteit van de Aziatische keuken. Ons leuke concept biedt 
                    <br>
                    je de mogelijkheid om gedurende 2,5 uur, per ronde, 3 gerechten per 
                    <br>
                    persoon te bestellen. Dit stelt je in staat om zorgvuldig je eigen culinaire 
                    <br>
                    proeverij samen te stellen. 
                    <br>
                    <br>
                    Onze menukaart omvat een uitgebreide selectie van gerechten, van heerlijke 
                    <br>
                    sushi-creaties tot smaakvolle wok- en grillgerechten. We streven naar 
                    <br>
                    absolute versheid en kwaliteit in elk gerecht dat we serveren 
                    <br>
                    <br>
                </p>
                <h2 class="line regular" id="menukaart"> <a href="menu.php"><span style="font-size: 1.4rem;"> <strong> Bekijk menukaart </strong></span></a></h2>
            </div>
        </div>
        <div class="container" id="cuisine-img">
            <img src="assets/img/cuisine1.png" alt="cuisine1">
            <img id="img-bump" src="assets/img/cuisine2.png" alt="cuisine2">
            <img src="assets/img/cuisine3.png" alt="cuisine3">
        </div>
        <div class="container">
            <div id="menu-text">
                <p>
                    <span style="font-size: 1.6rem;"> <strong> Geniet van ons all you can eat concept en ontdek de Aziatische keuken</strong> </span>
                    <br>
                    <br>
                    Bij Shusui kun je genieten van een uitgebreid aanbod aan 
                    <br>
                    Aziatische gerechtjes met ons all-you-can-eat concept. Van heerlijke sushi 
                    <br>
                    tot smaakvolle wok- en grillgerechten, wij brengen de authentieke Aziatische 
                    <br>
                    <br>
                    Onze gezellige ambiance en gastvrije bediening zorgen voor een 
                    <br>
                    onvergetelijke avond. Of je nu met vrienden, familie of collega's bent, bij 
                    <br>
                    Shusui kun je samen genieten van diverse Aziatische smaken. 
                    <br>
                    <br>
                    Ontsnap aan de dagelijkse routine en trakteer jezelf op een smaakvolle 
                    <br>
                    avond bij Shusui in Venray. Ontdek de veelzijdigheid van de Aziatische 
                    <br>
                    keuken. Reserveer vandaag nog.
                </p>
                <h2 class="line regular" id="gallerij"> <a href="gallery.php"><span style="font-size: 1.4rem;"> <strong> Gallerij </strong></span></a></h2>
            </div>
        </div>
        <div class="container" id="cuisine-img">
            <img src="assets/img/gal1.png" alt="cuisine1">
            <img id="img-bump" src="assets/img/gal2.png" alt="cuisine2">
            <img src="assets/img/gal3.png" alt="cuisine3">
        </div>
        <section class="full-width">
            <div>
                <h2 class="reserveer">
                    RESERVEER NU <br> UW TAFEL OF
                </h2>
            </div>
            <div class="reserveer">
                <h4 class="reserveer bump-left" >Liever thuis genieten van onze gerechten?
                <br>
                Genieten van ons heerlijke aanbod maar dan thuis? 
                <br> Dat kan! We hebben een  speciale kaart voor afhaal en bezorging. 
                <br>
                 Neem snel een kijkje.
                <br>
            </h4>
            <a class="reserveer a-newclass bold" href="bestel.php">BESTEL VOOR THUIS</a>
            </div>
        </section>
    </main>

    <?php
    include('footer.php');
    ?>
</body>

</html>