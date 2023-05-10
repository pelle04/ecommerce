<?php 
include_once("init.php");
$admin=0;
$db = new DB();
$db->signin(md5($_POST['password']),$_POST['email'],$_POST['nome'],$_POST['cognome'],$_POST['dataNascita']);
?>