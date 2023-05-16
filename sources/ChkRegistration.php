<?php 
session_start();
include("Connection.php");
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$indirizzo = $_POST['indirizzo'];
if (isset($nome, $cognome, $email, $password, $indirizzo)) {
  $sql = "INSERT into utente (nome, cognome,indirizzo,email,password) 
        values('$nome','$cognome','$indirizzo','$email','$password')";
      $conn->query($sql);
      header("location: Login.php");
}else{
  header("location: Registration.php");

}
?>





