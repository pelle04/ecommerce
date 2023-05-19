<?php
session_start();
include("connection.php");
$id = $_GET['id'];
$idCarrello = $_GET['idCarrello'];

//rimuovo da contiene
$sql = "delete from contiene where IdProdotto=".$id." and IdCarrello=".$idCarrello;
$result = $conn->query($sql);

//prendo prezzo tot del carrello
$sql = "select sum(p.prezzo) from contiene as c join prodotto as p on p.id = c.IdProdotto";
$prezzoCarrello = $conn->query($sql);

//inserisco in ordine
$oggi = date("Y/m/d");
$sqlOrdine = "INSERT INTO ordine (data, prezzo , IdCarrello) VALUES ('$oggi','$prezzoCarrello','$idCarrello')";
$conn->query($sqlOrdine);

?>