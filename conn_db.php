<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "senat";

$conn = mysqli_connect($servername, $username, $password,$dbname);

if(!$conn) {
    die("Echec de connexion a la BD : " . mysqli_connect_error());
}
// echo "Connexion avec succes a la BD";
?>