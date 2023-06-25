<?php
// Vérifiez si l'utilisateur est connecté
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Récupérez les informations de l'utilisateur connecté
$username = $_SESSION['username'];

// Affichez le contenu du tableau de bord
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord</title>
</head>
<body>
    <h1>Bienvenue, <?php echo $username; ?>, sur votre tableau de bord</h1>
    <p>Contenu et fonctionnalités du tableau de bord ici...</p>

    <a href="logout.php">Se déconnecter</a>
</body>
</html>
