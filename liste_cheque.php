<?php
include_once 'includes/header.php';
?>
<header>

</header>
<div class="row full">
    <div class="sideBar">
        <a href="connexion.php" class="button buttonBar"><span>Listes</span></a>
        <a href="liste_eleve.php" class="buttonBar3"><span>Détails</span></a>
        <a href="liste_cheque.php" class="buttonBar4"><span>Chèques</span></a>
        <a href="includes/deco.php" class="buttonBar2"><span>Deconnexion</span></a>
    </div>
    <div class="smallMargin">
        <p class="title centerText">Liste des chèques</p>
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
                    <label for="cheque">N° de chèque</label>
                    <button class="space-top button">trier par N° de chèque</button>
                </div>
                <div class="column filterElement">
                    <label for="encaisse">montant encaissé</label>
                </div>
                <div class="column filterElement">
                    <label for="rendu">montant rendu</label>
                </div>
                <div class="column filterElement">
                    <label for="comment">commentaire</label>
                </div>
            </div>
        </form>
        <div>
            <div class="below-table-grid2">
                <div>Texte 1</div>
                <div>uvuvuuvuuuvuvuvuvuvuvuvuuvuvuvaaaaaaaaaaaaaaaaaauvuuvuvuvuvuvuuvuvuvuv</div>
                <div>Texte 3</div>
                <div>Texte 4</div>
                <div>Texte 5</div>
                <div>Texte 6</div>
                <div>Texte 7</div>
                <div>Texte 8</div>
                <div>Texte 9</div>
                <div></div>
            </div>
        </div>
    </div>


</div>