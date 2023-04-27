<?php   
session_start();
include("connection.php");
include("prodotto.php");
include("ClassCarrello.php");
$idUtente = $_SESSION["idUtente"];

$sql = "SELECT * from carrelli where IDUtente= $idUtente";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){    
                $carrello = new carrello();
                $carrello.print($row);               
                }  
            }
        


?>