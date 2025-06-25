<?php
include_once 'includes/header.php';
if ($_SESSION['utilisateur']['role'] === 'eleve' && $_SESSION['utilisateur']['email'] !== null ) {
    header('Location: recap.php');
    exit();
}
if ($_SESSION['utilisateur']) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $card = trim($_POST['card']);
        $mail = trim($_POST['mail']);
        $birth = trim($_POST['birth']);
        $consent = isset($_POST['consent']) ? 1 : 0;
        $errorCard = '';
        $errorVide = '';
        $errorNai = '';
        $errorCase = '';

        if (empty($card) || empty($mail) || empty($birth)) {
            $errorVide = "Veuillez remplir tous les champs.";
        } elseif ($birth != $_SESSION['utilisateur']['date_nai']) {
            $errorNai = "La date de naissance ne correspond pas à celle de votre compte.";
        } elseif ($consent == 0) {
            $errorCase = "Veuillez cocher la case pour donner votre consentement.";
        } elseif (!empty($card) && !empty($mail) && !empty($birth) && $consent == 1 && $birth == $_SESSION['utilisateur']['date_nai']) {
            $requete1 = $connexion->prepare(
                'UPDATE utilisateur
            SET email_uti = :mail,
            date_nai_uti = :birth
            WHERE id_uti = :id'
            );
            $requete1->bindParam(':id', $_SESSION['utilisateur']['id']);
            $requete1->bindParam(':mail', $mail);
            $requete1->bindParam(':birth', $birth);
            $requete1->execute();

            // Insertion dans la table carte
            $requete2 = $connexion->prepare(
                'INSERT INTO carte 
            (num_carte, id_uti)
            VALUES (:card, :id);
            '
            );

            $requete2->bindParam(':card', $card);
            $requete2->bindParam(':id', $_SESSION['utilisateur']['id']);
            $requete2->execute();

            header('Location: recap.php');
            exit();


        }
    }
}
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
        <form action="" method="post">
            <div class="column">
                <?php if (isset($errorVide)): ?>
                    <p class="error"><?= htmlspecialchars($errorVide) ?></p>
                <?php endif; ?>
                <?php if (isset($errorCard) && ($errorCard != "")): ?>
                    <p class="error"><?= htmlspecialchars($errorCard) ?></p>
                <?php endif; ?>
                <label for="name">N° de carte</label>
                <input class="input" type="text" id="card" name="card" required>
                <label class="spaceTop" for="name">adresse mail</label>
                <input class="input" type="mail" id="mail" name="mail" required>
                <?php if (isset($errorNai) && ($errorNai != "")): ?>
                    <p class="error"><?= htmlspecialchars($errorNai) ?></p>
                <?php endif; ?>
                <label class="spaceTop" for="name">Date de naissance</label>
                <input class="input" type="date" id="birth" name="birth" required>
                <button class="button buttonConnect" type="submit">Se connecter</button>
            </div>
            <?php if (isset($errorCase) && ($errorCase != "")): ?>
                <p class="error"><?= htmlspecialchars($errorCase) ?></p>
            <?php endif; ?>
            <label class="row fit">
                <input class="checkbox" type="checkbox" id="consent" name="consent" required>
                <p class="conditions">Je donne l’autorisation à l’Apel du Lycée Saint-Vincent pour prélever sur ma carte
                    «Génération HDF» la somme de : <b>55€</b> pour les élèves de seconde, <b>65€</b> pour les élèves de
                    première,
                    <b>75€</b> pour
                    les élèves de terminales.
                </p>
            </label>
        </form>

        <p>Un problème ? <a href="mail.php" class="blueText noDeco">Cliquez ici</a> pour nous envoyer un
            e-mail
        </p>
    </div>
</div>
<?php
include_once 'includes/footer.php';
?>