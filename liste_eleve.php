<?php
include_once 'includes/header.php';
?>
<header>

</header>
<div class="row full">
    <div class="sideBar">
        <a href="connexion.php" class="button buttonBar"><span>Listes</span></a>
        <a href="liste_eleve.php" class="buttonBar4"><span>Détails</span></a>
        <a href="liste_cheque.php" class="buttonBar3"><span>Chèques</span></a>
        <a href="includes/deco.php" class="buttonBar2"><span>Deconnexion</span></a>
    </div>
    <div class="smallMargin">
        <p class="title centerText">Liste des élèves</p>
        <form action="" method="post">
            <div class="row filter">
                <div class="column filterElement">
                    <label for="name">nom</label>
                    <button class="space-top button">trier par nom</button>
                </div>
                <div class="column filterElement">
                    <label for="firstname">prenom</label>
                    <button class="space-top button">trier par prénom</button>
                </div>
                <div class="column filterElement">
                    <label for="class">classe</label>
                </div>
                <div class="column filterElement">
                    <label for="mail">e-mail</label>
                </div>
                <div class="column filterElement">
                    <label for="birth">date de naissance</label>
                </div>
                <div class="column filterElement">
                    <label for="card">N° de carte</label>
                    <button class="space-top button">trier par N° de carte</button>

                </div>
                <div class="column filterElement">
                    <label for="raz">RAZ</label>
                </div>
                <div class="column filterElement">
                    <label for="debit">Débité?</label>
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