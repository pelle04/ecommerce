<?php
session_start();
include("connection.php");
$marchio = $_GET["id"];
?>

<html>

</html>



<?php
$sql = "SELECT * from articoli where Marca='$marchio'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){    
                $prodotto = new prodotto();
                $prodotto.print($row);               
                }  
            }
?>