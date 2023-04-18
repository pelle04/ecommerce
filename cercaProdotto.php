<?php
session_start();
include("connection.php");

//query per trovare prodotto
$sql = "SELECT * from prodotti where Titolo LIKE '%%'";
$result = $conn->query($sql);
if($result->num_rows > 0){
    echo "<option>-</option>";
while($row = $result->fetch_assoc()){
    echo "<option>".$row["nome"]." ".$row["cognome"]."</option>";
}
}