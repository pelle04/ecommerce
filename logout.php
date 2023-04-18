<?php
session_start();
include("connection.php");
include("chkSession.php");
$_SESSION["loggato"] = false;
$_SESSION["nome"]="";
$_SESSION["idUtente"] = "";
header("location: index.php");
?>