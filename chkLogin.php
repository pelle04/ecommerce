<?php
include_once("init.php");
$db = new DB();
$db->login(md5($_POST["password"]),$_POST["email"]);
?>