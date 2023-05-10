<?php
session_start();
include_once("init.php");
$_SESSION["loggato"] = false;
$_SESSION["nome"]="";
$_SESSION["email"]="";
$_SESSION["idUtente"] = "";
$_COOKIE["carrello"] = "";
header("location: index.php");
?>