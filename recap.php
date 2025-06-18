<?php
include_once 'includes/header.php';
?>
<header>

</header>
<div class="row full">
    <div class="sideBar">
        <a href="recap.php" class="button buttonBar">Enregistré</a>
        <a href="includes/deco.php" class="buttonBar2">Deconnexion</a>
    </div>
    <div class="mainMargin">
        <p class="title">Carte enregistrée</p>
        <p class="subtitle greenText">Votre carte a bien été enregistrée</p>
        <form action=".php" method="post">
            <div class="column">
                <label for="name">N° de carte</label>
                <input class="input" type="text" id="card" name="card" readonly required>
                <label class="spaceTop" for="name">adresse mail</label>
                <input class="input" type="mail" id="mail" name="mail" readonly required>
                <label class="spaceTop" for="name">Date de naissance</label>
                <input class="input" type="date" id="birth" name="birth" readonly required>
            </div>
        </form>
        <p>Un problème ? <a href="mail.php" class="blueText noDeco">Cliquez ici</a> pour nous envoyer un
            e-mail
        </p>
    </div>
</div>
<?php
include_once 'includes/footer.php';
?>