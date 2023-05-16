<?php
session_start();
unset($_SESSION["id"]);
unset($_SESSION["idProdCarrello"]);
header("location: index.php");
    
?>