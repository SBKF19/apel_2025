<?php
include_once 'includes/header.php';
?>
<header>

</header>
<div class="row full">
    <div class="sideBar">
        <a href="connexion.php" class="button buttonBar">Connexion</a>
    </div>
    <div class="mainMargin">
        <p class="title">Apel lycée Saint-Vincent 2025</p>
        <p class="subtitle">un outil dédié à l’enregistrement des cartes
            Génération HDF au sein de votre établissement.</p>
        <p class="midtitle">Connexion</p>
        <form action="inscription.php" method="post">
            <div class="column">
                <label for="name">Nom de famille</label>
                <input class="input" type="text" id="name" name="name" required>
                <label class="spaceTop" for="name">Date de naissance</label>
                <input class="input" type="date" id="birth" name="birth" required>
                <button class="button buttonConnect" type="submit">Se connecter</button>
            </div>
    </div>
</div>
<?php
include_once 'includes/footer.php';
?>