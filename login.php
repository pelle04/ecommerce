<?php 
session_start();
include("connection.php");
?>
non sei ancora registrato?<br>
<a href='registrazione.php'>registrazione</a>
<form action="chklogin.php" method="POST">
<input type="text" id="login" name="email" placeholder="email">
<input type="password" id="password" name="password" placeholder="password">
<input type="submit" value="ACCEDI">
</form>

