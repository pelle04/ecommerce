<?php
session_start();
include_once("global.php");
global $conn;


$idUtente = $_SESSION["idUtente"];
$idProdotto = $_GET["id"];
header("Location: prodotti.php");

$admin = false;
if (isset($_SESSION["idUtente"])) {
    $utente = $conn->query("SELECT * FROM utenti WHERE ID = " . $_SESSION["idUtente"])->fetch_all(MYSQLI_ASSOC)[0];
    if ($utente['Admin'] == 1) {
        $admin = true;
    }
}

if ($admin != true) {
    header("Location: prodotti.php?err=errore");

} else {
    $conn->query("UPDATE articoli SET deleted = 1 WHERE Codice = " . $idProdotto);
}