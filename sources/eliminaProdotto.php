<?php
session_start();
include("Connection.php");

$id=$_GET["idProd"];
$sqlCerco="SELECT * FROM prodotto WHERE id=".$id;
$result = $conn->query($sqlCerco);
    if ($result->num_rows >0) {
        while ($row = $result->fetch_assoc()) {
            $cancellafoto="DELETE FROM foto WHERE idf=".$row["IdFoto"];
            $conn->query($cancellafoto);
            $cancellaprodotto="DELETE FROM prodotto WHERE id=".$id;
            $conn->query($cancellaprodotto);
        }

        header("location: index.php");
    }


?>  