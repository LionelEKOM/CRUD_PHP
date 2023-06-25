<?php
// Traitement du formulaire d'inscription

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validation et insertion des données dans la base de données

    // Code pour valider et insérer les données dans la base de données

    // Redirection après l'inscription réussie
    header("Location: index.php?success=registration_successful");
}
?>
