<?php   // file per connettere lo script al db
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_ecommerce";

 
$conn = new mysqli($servername,$username,$password,$dbname);




if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>