<?php
session_start();
require_once 'init.php';
include_once("classi/carrello.php");
$cart = new CartManager();
$idUtente = $_SESSION["idUtente"];
$cart->checkOut($idUtente);
setcookie('carrello', '', time() + 3600, '/');
header('Location: pagCarrello.php');
?>