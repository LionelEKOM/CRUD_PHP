<?php
include_once "conn_db.php";

if(isset($_POST['submit'])) {
    $prenom = $_POST['first_name'];
    $nom = $_POST['last_name'];
    $email = $_POST['user_email'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO users(`id`, `Prenom`, `Nom`, `email`, `sexe`) 
    VALUES (NULL, `$prenom`, `$nom`, `$email`, `$gender`)";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: index.php?msg=Nouvelle Enregistrement crée avec succes");
    }
    else {
        echo "Failled: " . mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">


    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />

    <title>PHP CRUD Applucation</title>
</head>

<body>

    <nav class="navbar navbar-light justify-content-center fs-3 mb-3"
    style="background-color: #8692f7;">
        Developpement du CRUD avec PHP
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Ajouter un nouvel utilisateur</h3>
            <p>Veuillez renseigner le formulaire ci-apres </p>
        </div>
    </div>

    <div class="container d-flex  justify-content-center">
        <form action="" method="post"
        style="width: 55vw; min-width: 300px;">
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Prenom :</label>
                    <input class="form-control" type="text" name="first_name" id=""
                    placeholder="Lionel">
                </div>
                <div class="col">
                    <label class="form-label">Nom :</label>
                    <input class="form-control" type="text" name="last_name" id=""
                    placeholder="EKOM">
                </div>
            </div>
            <div class="col mb-3">
                    <label class="form-label">Email :</label>
                    <input class="form-control" type="email" name="user_email" id=""
                    placeholder="name@gmail.com">
            </div>
            <div class="form-group mb-3">
                <label for="">Genre : </label>

                &nbsp;
                <input type="radio" name="gender" class="form-check-input" id="Feminin" value="Feminin">
                <label for="Female" class="form-input-label">Feminin</label>

                &nbsp;
                <input type="radio" name="gender" class="form-check-input" id="Masculin" value="Masculin">
                <label for="Male" class="form-input-label">Masculin</label>
            </div>
            <div class="col justify-content-center">
                <button type="submit" class="btn btn-success" name="submit" style="width: 85px;">Save</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>