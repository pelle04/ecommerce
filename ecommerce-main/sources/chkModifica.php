<?php
session_start();
include("Connection.php");


$titolo = $_GET['titolo'];
$descrizione = $_GET['descrizione'];
$venditore = $_GET['venditore'];
$quantita = $_GET['quantita'];
$prezzo = $_GET['prezzo'];
$id=$_SESSION["idProdCarrello"];
$sql = "UPDATE prodotto SET titolo='$titolo', descrizione='$descrizione', venditore='$venditore', quantitaMag='$quantita', prezzo='$prezzo' WHERE id=$id";
$conn->query($sql);
unset($_SESSION["idProdCarrello"]);
header("location: index.php");







?>