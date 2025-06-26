<?php
include_once 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $birth = trim($_POST['birth']);

    if (!empty($name) && !empty($birth)) {

        $requete = $connexion->prepare('
        SELECT id_uti, nom_uti, prenom_uti, date_nai_uti, role_uti, id_classe, email_uti
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
                'id' => $utilisateur['id_uti'],
                'nom' => $utilisateur['nom_uti'],
                'prenom' => $utilisateur['prenom_uti'],
                'date_nai' => $utilisateur['date_nai_uti'],
                'role' => $utilisateur['role_uti'],
                'classe' => $utilisateur['id_classe'],
                'email' => $utilisateur['email_uti']
            ];

            $requete2 = $connexion->prepare('
        SELECT id_carte
        FROM carte
        WHERE id_uti = :id
        ');
            $requete2->bindParam('id', $utilisateur['id_uti']);
            $requete2->execute();
            $carte = $requete2->fetch(\PDO::FETCH_ASSOC);
            if ($carte) {
                $_SESSION['utilisateur']['carte'] = $carte['id_carte'];
            } else {
                $_SESSION['utilisateur']['carte'] = null;
            }

            // Redirection vers la liste des élèves si l'utilisateur est un élève
            if ($_SESSION['utilisateur']['role'] == 'eleve' && !empty($_SESSION['utilisateur']['email']) && ($_SESSION['utilisateur']['carte']) != NULL) {
                header('Location: recap.php');
                exit();
            } elseif ($_SESSION['utilisateur']['role'] == 'eleve' && $_SESSION['utilisateur']['carte'] == null) {
                header('Location: inscription.php');
                exit();
            } elseif ($_SESSION['utilisateur']['role'] == 'admin') {
                header('Location: listes.php');
                exit();
            } elseif ($_SESSION['utilisateur']['role'] == '0') {
                header('Location: closed.php');
            }
        } else {
            $error = "*Aucun utilisateur trouvé avec ces informations, verifiez l'ortographe*";
        }
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
        <form action="" method="post">
            <div class="column">
                <?php if (isset($error)): ?>
                    <p class="error"><?= htmlspecialchars($error) ?></p>
                <?php endif; ?>
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