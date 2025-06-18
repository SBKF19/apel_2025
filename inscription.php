<?php
include_once 'includes/header.php';
?>
<header>

</header>
<div class="row full">
    <div class="sideBar">
        <a href="inscription.php" class="button buttonBar">Enregistrement</a>
        <a href="includes/deco.php" class="buttonBar2">Deconnexion</a>
    </div>
    <div class="mainMargin">
        <p class="title">Apel lycée Saint-Vincent 2025</p>
        <p class="midtitle">Veuillez renseigner votre numéro de carte, e-mail et date de naissance</p>
        <form action="recap.php" method="post">
            <div class="column">
                <label for="name">N° de carte</label>
                <input class="input" type="text" id="card" name="card" required>
                <label class="spaceTop" for="name">adresse mail</label>
                <input class="input" type="mail" id="mail" name="mail" required>
                <label class="spaceTop" for="name">Date de naissance</label>
                <input class="input" type="date" id="birth" name="birth" required>
                <button class="button buttonConnect" type="submit">Se connecter</button>
            </div>
        </form>
        <label class="row fit">
            <input class="checkbox" type="checkbox" required>
            <p class="conditions">Je donne l’autorisation à l’Apel du Lycée Saint-Vincent pour prélever sur ma carte
                «Génération HDF» la somme de : <b>55€</b> pour les élèves de seconde, <b>65€</b> pour les élèves de
                première,
                <b>75€</b> pour
                les élèves de terminales.
            </p>
        </label>

        <p>Un problème ? <a href="mail.php" class="blueText noDeco">Cliquez ici</a> pour nous envoyer un
            e-mail
        </p>
    </div>
</div>
<?php
include_once 'includes/footer.php';
?>