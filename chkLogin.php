<?php
include_once("init.php");
$email = $_POST["email"];
$password = md5($_POST["password"]);
$db = new DB();
$db->login($password,$email);
?>