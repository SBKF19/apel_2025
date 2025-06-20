<?php
include_once 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $birth = trim($_POST['birth']);

    if (!empty($name) && !empty($birth)) {

        $requete = $connexion->prepare('
        SELECT nom_uti, prenom_uti, date_nai_uti, role_uti, id_classe
        FROM utilisateur
        WHERE nom_uti = :name AND date_nai_uti = :birth
        ');
        $requete->bindParam('name', $name);
        $requete->bindParam('birth', $birth);
        $requete->execute();
        $utilisateur = $requete->fetch(\PDO::FETCH_ASSOC);

        if ($utilisateur) {
            // L'utilisateur existe, on le connecte.
            $_SESSION['utilisateur'] = [
                'nom' => $utilisateur['nom_uti'],
                'prenom' => $utilisateur['prenom_uti'],
                'date_nai' => $utilisateur['date_nai_uti'],
                'role' => $utilisateur['role_uti'],
                'classe' => $utilisateur['id_classe']
            ];
            header('Location: liste_eleve.php');
            exit();
        } else {
            $error = "Aucun utilisateur trouvé avec ces informations.";
        }


        header('Location: inscription.php');
        exit();
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}


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
            <p>Problèmes de connexion ? <a href="mail.php" class="blueText noDeco">Cliquez ici</a> pour nous envoyer un
                e-mail
            </p>
    </div>
</div>
<?php
include_once 'includes/footer.php';
?>