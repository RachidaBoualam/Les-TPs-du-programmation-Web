<?php
// Sécuriser les données reçues
$nom = strip_tags($_POST['nom']);
$prenom = strip_tags($_POST['prenom']);
$email = strip_tags($_POST['email']);
$mdp = strip_tags($_POST['mdp']);
$message = strip_tags($_POST['message']);

echo "<h1>Merci pour votre message, $prenom $nom</h1>";
echo "<p>Votre email : $email</p>";
echo "<p>Votre mot de passe : $mdp</p>";
echo "<p>Votre message : $message</p>";
?>
