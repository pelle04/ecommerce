<?php
session_start();
include("connection.php");
$id = $_GET['id'];
$idCarrello = $_GET['idCarrello'];



//prendo prezzo tot del carrello
$sql = "select sum(p.prezzo)*c.quantita as sium from contiene as c join prodotto as p on p.id = c.IdProdotto;";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if(isset($row["sium"])){
            echo "il prezzo del tuo ordine è di ".$row["sium"];
            $oggi = date("Y/m/d");
            $sqlOrdine = "INSERT INTO ordine (data, prezzo , IdCarrello) VALUES ('$oggi','".$row["sium"]."','$idCarrello')";
            $conn->query($sqlOrdine);
        }
    }
  }else {
    echo "0 results";
}
//inserisco in ordine

//$sql = "delete from contiene where IdProdotto=".$id." and IdCarrello=".$idCarrello;
//$result = $conn->query($sql);

?>