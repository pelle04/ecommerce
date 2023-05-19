<?php
session_start();
include("Connection.php");
if (!isset($_SESSION["id"])) {
    header("location: Login.php");
}else{
$sql = 'SELECT * from utente where id = '. $_SESSION["id"];
    $result = $conn->query($sql);
    if ($result->num_rows <= 0) {
        header("location: Login.php");
    }
    else{//lo ha trovato quindi salva il suo utente nella sessione 
        while ($row = $result->fetch_assoc()) {
            if ($_SESSION["id"] == $row["id"]) {
                $_SESSION["id"]=$row["id"];
                header("location: index.php");
            }
        }

 

    }

}
?>