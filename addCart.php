<?php
session_start();
require_once 'init.php';
include_once("auth/template/head.php");
include_once("classi/carrello.php");

$idUtente = $_SESSION["idUtente"];
$quantita = $_POST["quantita"];
$idProdotto = $_POST["idProdotto"];
$cart = new CartManager();
$cart->addToCart($idProdotto,$quantita);  //setta il cookie del carrello 
$cart->controllaCookieCarrello($idUtente,$quantita);
header("Location: prodotti.php");
?>

