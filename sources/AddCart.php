<?php
session_start();
include("Connection.php");

$data=date("Y-m-d");
$idprod=$_SESSION['idProdCarrello'];
$quant=$_GET["quantita"];
$idutente=$_SESSION['id'];

$ricercaCarrelli = "SELECT * from carrello where IdUtente=".$idutente." AND data='".$data."'";
$resultricercaCarrelli = $conn->query($ricercaCarrelli);
if ($resultricercaCarrelli->num_rows > 0) {
    while ($rowricercaCarrelli = $resultricercaCarrelli->fetch_assoc()) {
        $idCarrello=$rowricercaCarrelli["id"];

        $inserisceprod1 = "INSERT INTO contiene (IdCarrello, IdProdotto, quantita) VALUES ('$idCarrello','$idprod','$quant')";
        $conn->query($inserisceprod1);
        header("location: Product.php?id=".$idprod);

    }}else{
        $sqlcarrello = "INSERT INTO carrello (data, IdUtente) VALUES ('$data','$idutente')";
        $conn->query($sqlcarrello);

        $ricercaCarrelli2 = "SELECT * from carrello where IdUtente=".$idutente." AND data='".$data."'";
        $resultricercaCarrelli2 = $conn->query($ricercaCarrelli2);

        if ($resultricercaCarrelli2->num_rows > 0) {
            while ($rowricercaCarrelli2 = $resultricercaCarrelli2->fetch_assoc()) {}
            $idnuovoCarrello=$rowricercaCarrelli2["id"];

            $inserisceprod2 = "INSERT INTO contiene (IdCarrello, IdProdotto, quantita) VALUES ('$idnuovoCarrello','$idprod','$quant')";
            $conn->query($ricercaCarrelli);


        }else{
            echo "carrello non trovato";
        }



        
    }





?>