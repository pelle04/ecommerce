<?php
session_start();
include_once("init.php");
$_SESSION["loggato"] = false;
$_SESSION["nome"]="";
$_SESSION["idUtente"] = "";
header("location: index.php");
?>