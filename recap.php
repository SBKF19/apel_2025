<?php
include_once 'includes/header.php';
$requete = $connexion->prepare(
    'SELECT num_carte, email_uti, date_nai_uti
    FROM carte, utilisateur
    WHERE carte.id_uti = :id AND utilisateur.id_uti = :id'
);
$requete->bindParam(':id', $_SESSION['utilisateur']['id']);
$requete->execute();
$recap = $requete->fetch(\PDO::FETCH_ASSOC);

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
                <label for="card">N° de carte</label>
                <input class="input" type="text" id="card" name="card" readonly required
                    value="<?php echo htmlspecialchars($recap['num_carte'] ?? ''); ?>">
                <label class="spaceTop" for="mail">adresse mail</label>
                <input class="input" type="mail" id="mail" name="mail" readonly required
                    value="<?php echo htmlspecialchars($recap['email_uti'] ?? ''); ?>">
                <label class="spaceTop" for="birth">Date de naissance</label>
                <input class="input" type="date" id="birth" name="birth" readonly required
                    value="<?php echo htmlspecialchars($recap['date_nai_uti'] ?? ''); ?>">
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