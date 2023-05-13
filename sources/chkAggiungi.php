<?php
session_start();
include("Connection.php");


#AGGIUNTA DELLA FOTO DA ERRORE

$sql="";

$titolo = $_GET['titolo'];
  $descrizione = $_GET['descrizione'];
  $venditore = $_GET['venditore'];
  $quantita = $_GET['quantita'];
  $prezzo = $_GET['prezzo'];
  $categoria = $_GET['categoria'];


  #$targetDirectory = "uploads/";  // Directory di destinazione delle immagini
  #$targetFile = $targetDirectory . basename($_FILES["foto"]["name"]);  // Percorso completo dell'immagine
#
  #// Verifica se il file immagine è stato caricato correttamente
  #if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {
  #  echo "L'immagine è stata caricata correttamente.";
  #} else {
  #  echo "Si è verificato un errore durante il caricamento dell'immagine.";
  #}
  #$foto=$targetFile;
#
  #$sqlfoto="INSERT INTO foto(path) VALUES ('".$foto."')";
  #$conn->query($sqlfoto);

  $sqlcercaCategoria = 'SELECT * FROM categoria WHERE nome='.$categoria;
  $resultcercaCategoria = $conn->query($sqlcercaCategoria);
  if ($resultcercaCategoria->num_rows > 0) {  
    while ($rowcercaCategoria = $resultcercaCategoria->fetch_assoc()) {
        $idCategoria=$row["idc"];
  }}

  #$sqlcercafoto = 'SELECT * FROM categoria WHERE nome='.$foto;
  #$resultcercafoto = $conn->query($sqlcercafoto);
  #if ($resultcercafoto->num_rows > 0) {  
  #  while ($rowcercafoto = $resultcercafoto->fetch_assoc()) {
  #      $idfoto=$row["idf"];
  #}}
    $idfoto=6;
  $sqlcategoria="INSERT INTO prodotto(titolo,descrizione, venditore, quantitaMag, prezzo, IdCategoria, IdFoto) VALUES ('$titolo','$descrizione','$venditore','$quantita','$prezzo','$idCategoria','$idfoto')";
  $conn->query($sqlcategoria);
unset($_SESSION["idProdCarrello"]);
header("location: index.php");
