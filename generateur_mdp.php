<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Générateur de mot de passe</title>
</head>
<body>
    <h2>Générateur de mot de passe</h2>

    <form method="post" action="">
        <label>Longueur du mot de passe :</label>
        <input type="number" name="longueur" min="4" max="100" required><br><br>
        <input type="submit" name="generer" value="Générer">
    </form>

    <?php
    // Fonction pour générer un mot de passe aléatoire
    function genererMotDePasse($longueur) {
        $lettres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $chiffres = '0123456789';
        $speciaux = '!@#$%^&*()-_=+[]{};:,.<>?';
        
        // Tous les caractères possibles
        $tous = $lettres . $chiffres . $speciaux;

        $motDePasse = '';
        for ($i = 0; $i < $longueur; $i++) {
            $index = rand(0, strlen($tous) - 1);
            $motDePasse .= $tous[$index];
        }

        return $motDePasse;
    }

    // Traitement du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $longueur = intval($_POST['longueur']);

        if ($longueur < 4) {
            echo "<h3 style='color:red;'>La longueur doit être d'au moins 4 caractères.</h3>";
        } else {
            $mdp = genererMotDePasse($longueur);
            echo "<h3>Mot de passe généré : <code>$mdp</code></h3>";
        }
    }
    ?>
</body>
</html>
