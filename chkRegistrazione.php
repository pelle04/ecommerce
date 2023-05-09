<?php 
session_start();
include_once("connection.php");
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$email = $_POST['email'];
$dataNascita = $_POST['dataNascita'];
$password = md5($_POST['password']);
$admin=0;

  $sql = "INSERT into utenti (Nome,Cognome,Admin,Password,Email,DataNascita) values(?,?,?,?,?,?)";
  $stm = $conn->prepare($sql);
  $stm->bind_param("ssissd",$nome,$cognome,$admin,$password,$email,$dataNascita);
  
  $result=$stm->execute();
  if($result){
    $_SESSION["loggato"]=true;  //fai l accesso e sei gia loggato 
    $_SESSION["nome"] = $_POST['nome'];
    header("location: index.php");
  }else{
    echo "Error: " . $sql . "<br>" . $conn->error;
  
  }


?>