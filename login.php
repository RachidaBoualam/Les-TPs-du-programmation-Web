<?php
session_start();

// Identifiants définis en dur
$utilisateur_valide = "admin";
$motdepasse_valide = "1234";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Vérification
    if ($username === $utilisateur_valide && $password === $motdepasse_valide) {
        $_SESSION['utilisateur'] = $username;
        header("Location: bienvenue.php");
        exit();
    } else {
        $erreur = "Identifiant ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h2>Connexion</h2>

    <?php if (isset($erreur)) echo "<p style='color:red;'>$erreur</p>"; ?>

    <form method="post">
        <label>Nom d'utilisateur :</label><br>
        <input type="text" name="username" required><br><br>

        <label>Mot de passe :</label><br>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
