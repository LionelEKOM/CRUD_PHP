<?php
include "conn_db.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}

if(isset($_POST['submit'])) {
    $prenom = $_POST['first_name'];
    $nom = $_POST['last_name'];
    $email = $_POST['user_email'];
    $gender = $_POST['gender'];
    $id = $_POST['user_id'];

    $sql ="UPDATE  users  SET Prenom ='$prenom', Nom = '$nom',
     Email = '$email' , sexe = '$gender'  WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if($result) {
        header("Location: index.php?msg=Donnée modifiée avec succès!!");
    }
    else {
        echo "Failed: " . mysqli_error($conn);
    }

    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD Application</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-3" style="background-color: #8692f7;">
        Développement du CRUD avec PHP
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Mettre à jour les informations d'un utilisateur</h3>
            <p>Cliquez sur <strong>'Mettre à jour'</strong> après avoir modifié les informations</p>
        </div>
    </div>
        <?php
        $sql = "SELECT * FROM `users` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
    <div class="container d-flex justify-content-center">
        <form action="edit.php" method="post" style="width: 55vw; min-width: 300px;">
            <div class="row mb-3">
                <input class="form-control" type="text" name="user_id" id="" value="<?= $id ?>" hidden>
                <div class="col">
                    <label class="form-label">Prénom :</label>
                    <input class="form-control" type="text" name="first_name" id="" value="<?= $row ['Prenom'] ?>">
                </div>
                <div class="col">
                    <label class="form-label">Nom :</label>
                    <input class="form-control" type="text" name="last_name" id="" value="<?= $row ['Nom'] ?>">
                </div>
            </div>
            <div class="col mb-3">
                <label class="form-label">Email :</label>
                <input class="form-control" type="email" name="user_email" id="" value="<?= $row ['Email'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="">Genre :</label>

                &nbsp;
                <input type="radio" name="gender" class="form-check-input" id="Feminin"
                value="Feminin"<?php echo ($row['sexe'] == 'Feminin')? "checked":";" ?>>
                <label for="Feminin" class="form-check-label">Féminin</label>

                &nbsp;
                <input type="radio" name="gender" class="form-check-input" id="Masculin"
                value="Masculin"<?php echo ($row['sexe'] == 'Masculin')? "checked":";" ?>>
                <label for="Masculin" class="form-check-label">Masculin</label>
            </div>
            <div class="col justify-content-center">
                <button type="submit" class="btn btn-success" style="width: auto;" 
                name="submit">Mettre à jour</button>
                <a href="index.php" class="btn btn-danger">Annuler</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
