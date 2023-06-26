<?php 
include "conn_db.php";

$id = $_GET['id'];
$sql = "DELETE FROM `users` WHERE  id = $id";
$result = mysqli_query($conn, $sql);

if($result){
    header("Location: index.php?msg= Enregistrement supprimé avec succes!!");
}
else {
    echo "Failled: " . mysqli_error($conn);
}
?>