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

  $immagine = basename( $_FILES["foto"]["name"]);
$target_dir = "prod_images/";
$target_file = $target_dir . basename($_FILES["foto"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["foto"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
 // Check file size
if ($_FILES["foto"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
 }
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
        if ($conn->query($sql) === TRUE) {
            header("location: index.php");
         } else {
           echo "Error: " . $sql . "<br>" . $conn->error;
         }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



  $sqlcercaCategoria = 'SELECT * FROM categoria WHERE nome='.$categoria;
  $resultcercaCategoria = $conn->query($sqlcercaCategoria);
  if ($resultcercaCategoria->num_rows > 0) {  
    while ($rowcercaCategoria = $resultcercaCategoria->fetch_assoc()) {
        $idCategoria=$row["id"];
  }}

  $sqlcercafoto = 'SELECT * FROM categoria WHERE nome='.$immagine;
  $resultcercafoto = $conn->query($sqlcercafoto);
  if ($resultcercafoto->num_rows > 0) {  
    while ($rowcercafoto = $resultcercafoto->fetch_assoc()) {
        $idfoto=$row["id"];
  }}
    $idfoto=6;
  $sqlcategoria="INSERT INTO prodotto(titolo,descrizione, venditore, quantitaMag, prezzo, IdCategoria, IdFoto) VALUES ('$titolo','$descrizione','$venditore','$quantita','$prezzo','$idCategoria','$idfoto')";
  $conn->query($sqlcategoria);
unset($_SESSION["idProdCarrello"]);
header("location: index.php");
