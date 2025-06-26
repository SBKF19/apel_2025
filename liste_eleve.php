<?php
include_once 'includes/header.php';
$requete1 = $connexion->prepare(
    query: 'SELECT nom_uti, prenom_uti, id_classe, email_uti, date_nai_uti, num_carte
FROM utilisateur
JOIN carte ON utilisateur.id_uti = carte.id_uti
WHERE utilisateur.role_uti = "eleve";'
);
$requete1->execute();
$liste = $requete1->fetchAll(PDO::FETCH_ASSOC);

?>
<header>

</header>
<div class="row full">
    <div class="sideBar">
        <a href="listes.php" class="button buttonBar"><span>Listes</span></a>
        <a href="liste_eleve.php" class="buttonBar4"><span>Détails</span></a>
        <a href="liste_cheque.php" class="buttonBar3"><span>Chèques</span></a>
        <a href="includes/deco.php" class="buttonBar2"><span>Deconnexion</span></a>
    </div>
    <div class="smallMargin">
        <p class="title centerText">Liste des élèves</p>
        <form action="" method="post">
            <div class="row filter vwidth85">
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
                <?php foreach ($liste as $eleve) { ?>
                    <div> <?php echo $eleve["nom_uti"] ?> </div>
                    <div> <?php echo $eleve["prenom_uti"] ?> </div>
                    <div> <?php echo $eleve["id_classe"] ?> </div>
                    <div> <?php echo $eleve["email_uti"] ?> </div>
                    <div> <?php echo $eleve["date_nai_uti"] ?> </div>
                    <div> <?php echo $eleve["num_carte"] ?> </div>
                    <div>
                        <button type="button"> Remettre à zéro </button>
                    </div>
                    <div>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>


</div>