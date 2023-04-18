<?php
session_start();
include("connection.php");
$sql = "SELECT * from utenti where email=? and password=?";
$stm = $conn->prepare($sql);
$stm->bind_param("ss",$email,$password);
$email = $_POST["email"];
$password = md5($_POST["password"]);

$stm->execute();
$result = $stm->get_result();

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);
    //se accesso andato a buon fine setto la session email e la session loggato e mi manda all homepage  
    $_SESSION["email"] = $email;
    $_SESSION["nome"]= $row["nome"];
    $_SESSION["loggato"] = true;
    $_SESSION["idUtente"] = $row["id"];
    header('Location: index.php');

}else{
    echo "<script>alert('credenziali errate')</script>";
    //header('Location: index.php?msg=errore');
}
?>