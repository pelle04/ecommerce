<?php
session_start();
include("Connection.php");
$id=$_GET["idcontiene"];

if(isset($id)){
    $sql1="DELETE FROM contiene WHERE idcont=".$id;
    //echo $sql1;
    $conn->query($sql1);
    
    header('Location: carrello.php');


}

















?>