<?php
include_once 'includes/header.php';
$requete = $connexion->prepare(
    'SELECT COUNT(utilisateur.id_uti) AS total
FROM utilisateur
WHERE utilisateur.role_uti = "eleve";'
);
$requete->execute();
$recap[0] = $requete->fetch(\PDO::FETCH_ASSOC);

$requete2 = $connexion->prepare(
    'SELECT COUNT(utilisateur.id_uti) AS inscrit
FROM utilisateur, carte
WHERE utilisateur.id_uti = carte.id_uti
AND utilisateur.role_uti = "eleve"'
);
$requete2->execute();
$recap[1] = $requete2->fetch(\PDO::FETCH_ASSOC);
$reste = $recap[0]['total'] - $recap[1]['inscrit'];

?>
<header>

</header>
<div class="row full">
    <div class="sideBar">
        <a href="connexion.php" class="button buttonBar"><span>Listes</span></a>
        <a href="liste_eleve.php" class="buttonBar3"><span>Détails</span></a>
        <a href="liste_cheque.php" class="buttonBar3"><span>Chèques</span></a>
        <a href="includes/deco.php" class="buttonBar2"><span>Deconnexion</span></a>
    </div>
    <div class="mainMargin">
        <div class="row gap fit marginAuto">
            <div class="column fit">
                <p class="title center fit  marginAuto">
                    <?php echo $recap[0]['total'] ?>
                </p>
                <p class="title">élèves total</p>
            </div>
            <div class="column fit">
                <p class="title center fit  marginAuto">
                    <?php echo $recap[1]['inscrit'] ?>
                </p>
                <p class="title">élèves inscrits</p>
            </div>
            <div class="column fit">
                <p class="title center fit  marginAuto">
                    <?php echo $reste ?>
                </p>
                <p class="title">élèves restants</p>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'includes/footer.php';
?>