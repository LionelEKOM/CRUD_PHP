<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"  href="style.css">
    <title>Page d'Authentification et d'Inscription</title>
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h2>Connexion</h2>
            <form action="login.php" method="POST">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">Se connecter</button>
            </form>
        </div>
        <div class="form-wrapper">
            <h2>Inscription</h2>
            <form action="register.php" method="POST">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required>
                <input type="email" name="email" placeholder="Adresse e-mail" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">S'inscrire</button>
            </form>
        </div>
    </div>
</body>
</html>
