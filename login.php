<?php
// Traitement du formulaire de connexion

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Vérification des informations d'authentification dans la base de données

    // Connectez-vous à votre base de données
    $servername = "MySQL:3306";
    $username_db = "root";
    $password_db = "";
    $dbname = "senat";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username_db, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparez la requête pour vérifier les informations d'authentification
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Vérifiez si l'utilisateur existe dans la base de données
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();

            // Vérifiez le mot de passe
            if (password_verify($password, $user['password'])) {
                // Authentification réussie
                session_start();
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                exit();
            } else {
                // Mot de passe incorrect
                header("Location: index.php?error=invalid_password");
                exit();
            }
        } else {
            // Utilisateur non trouvé
            header("Location: index.php?error=user_not_found");
            exit();
        }
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
?>
