<?php
session_start();
include "classi/DB.php";
require_once 'init.php';
include_once("auth/template/head.php");
include_once("classi/carrello.php");

$idUtente = $_SESSION["idUtente"];
$quantita = $_GET["quantita"];
$idProdotto = $_GET["idProdotto"];

$DB= new DB();
$sql="select quantita from articoli where Codice=".$idProdotto;
$result=$DB->query($sql);
if($result["quantita"]<=$quantita){
    header("Location: pagCarrello.php");
    die();
}
else{
    $cart = new CartManager();
    $cart->addToCart($idProdotto,$quantita);  //setta il cookie del carrello 
    // $cart->controllaCookieCarrello($idUtente,$quantita,"+");
    header("Location: pagCarrello.php");
}
?>

