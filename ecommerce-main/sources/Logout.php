<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["idProdCarrello"]);
unset($_SESSION['admin']);
header("location: index.php");
?>