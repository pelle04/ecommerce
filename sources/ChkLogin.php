<?php 
session_start();
include("Connection.php");

$email = $_POST["email"];
$password = $_POST["password"];


if (isset($email, $password)) {
    $sql = "SELECT * from utente where email='". $email ."'and password='".md5($password)."'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc(); 
        $_SESSION["id"]=$row["id"];
        header('Location: index.php');
    
    }else{
        header('Location: index.php?msg=errore');
    }
}



?>


