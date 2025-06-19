<?php
include_once 'includes/header.php';
?>
<header>

</header>
<div class="row full">
    <div class="sideBar">
        <a href="connexion.php" class="button buttonBar">Connexion</a>
    </div>
    <div class="smallMargin">
        <p class="title">Carte enregistrée</p>
        <p class="subtitle greenText">Votre carte a bien été enregistrée</p>
        <form action=".php" method="post">
            <div class="row filter">
                <div class="column filterElement">
                    <label for="name">nom</label>
                    <input class="input" type="text" id="name" name="name" required>
                </div>
                <div class="column filterElement">
                    <label class="spaceTop" for="name">prenom</label>
                    <input class="input" type="text" id="firstname" name="firstname" required>
                </div>
                <div class="column filterElement">
                    <label class="spaceTop" for="name">classe</label>
                    <input class="input" type="text" id="class" name="class" required>
                </div>
                <div class="column filterElement">
                    <label class="spaceTop" for="name">e-mail</label>
                    <input class="input" type="mail" id="mail" name="mail" required>
                </div>
                <div class="column filterElement">
                    <label class="spaceTop" for="name">date de naissance</label>
                    <input class="input" type="date" id="birth" name="birth" required>
                </div>
                <div class="column filterElement">
                    <label class="spaceTop" for="name">N° de carte</label>
                    <input class="input" type="text" id="number" name="number" required>
                </div>
                <div class="column filterElement">
                    <label class="spaceTop" for="name">RAZ</label>
                </div>
                <div class="column filterElement">
                    <label class="spaceTop" for="name">Débité?</label>
                    <input class="input" type="text" id="birth" name="birth" required>
                </div>
            </div>
        </form>
        <div>
            <div class="below-table-grid">
                <div>Texte 1</div>
                <div>uvuvuuvuuuvuvuvuvuvuvuvuuvuvuvaaaaaaaaaaaaaaaaaauvuuvuvuvuvuvuuvuvuvuv</div>
                <div>Texte 3</div>
                <div>Texte 4</div>
                <div>Texte 5</div>
                <div>Texte 6</div>
                <div>Texte 7</div>
                <div>Texte 8</div>
                <div>Texte 9</div>
            </div>
        </div>
    </div>


</div>