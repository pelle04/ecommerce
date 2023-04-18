<?php
include("connection.php");
?>

<html>

    <body>

    <h2> REGISTRAZIONE </h2>
    <a href="login.php">ACCEDI </a><br>
    <a href="index.php">continua senza accesso</a>

    <form action="chkRegistrazione.php" method="POST">
      <input type="text" id="nome" name="nome" placeholder="nome">
      <input type="text" id="cognome" name="cognome" placeholder="cognome">
      <input type="email" id="email" name="email" placeholder="email">
      <input type="date" id="dataNascita" name="dataNascita" placeholder="dataNascita">
      <input type="password" id="password" name="password" placeholder="password">
      <input type="submit" value="Registrati">
    </form>

  </div>
</div>
    
    </body>
