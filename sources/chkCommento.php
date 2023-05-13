<?php
session_start();
include("Connection.php");

$text = $_POST['text'];
$stelle = $_POST['stelle'];
$idProdotto=$_SESSION["IdProdotto"];
$idUtente= $_SESSION["id"];
if (!isset($_SESSION["id"])) {
    header("location: AccountRedirect.php");

}

$sql = "INSERT INTO commento (text, stelle, IdUtente,IdProdotto	)
        VALUES ('$text', '$stelle', '$idUtente', '$idProdotto')";

if ($conn->query($sql) === TRUE) {
    unset($_SESSION["IdProdotto"]);
    header("location: Product.php?id='" . $idProdotto . "'");

} else {
    echo "Errore durante il salvataggio del commento: " . $conn->error;
}

?>  