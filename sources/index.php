<?php
session_start();
include("Connection.php");
$filtro="";
if (isset($_GET["filtro"])) {
    $filtro = $_GET["filtro"];
}
?>



<html>

<head>
    <title>MainPage</title>
    <link rel="stylesheet" href="home.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <header>
        <nav>
            <ul>
                <div class="container mt-5">
                    <div class="row">
                    <div class="col">
                            <div class="search-bar">
                                <form action="index.php" method="GET">  
                                    <input type="text" name="filtro" placeholder="Cerca prodotti..." />
                                    <button type="submit">Cerca</button>
                                </form>
                            </div>

                        </div>
                        <div class="col">
                            <li><button class="btn" onclick="window.location.href = 'index.php'">HOME</button></li>
                            <li><button class="btn" onclick="window.location.href = 'carrello.php'">CARRELLO</button></li>
                            <li><button class="btn" onclick="window.location.href = 'Logout.php'">Log out</button></li>
                        </div>
                        
                    </div>


            </ul>

        </nav>

    </header>


    <div class="container">
        <h3 class="text-center">Prodotti</h3>
        <div class="row">
            <?php
        if ($filtro != "") {
                $sql = 'SELECT * from prodotto as p join foto as f on p.IdFoto=idf join categoria as c on p.IdCategoria=idc  where titolo like "%' . $filtro . '%" OR venditore like "%' . $filtro . '%"';
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='card'>";
                        echo "<a href='Product.php?id=" . $row["id"] . "'>";
                        echo "<img src='" . $row["path"] . "' alt='Prodotto'>";
                        echo "</a>";
                        echo "<h3>" . $row["titolo"] . "</h3>";
                        echo "<p>Prezzo: " . $row["prezzo"] . "€</p>";
                        echo "</div>";
                        
                        
                      
                    }
                }
            } else {
                $sql = 'SELECT * from prodotto as p join foto as f on p.IdFoto=idf join categoria as c on p.IdCategoria=idc  where 1';
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    if ($result->num_rows > 0) {
                    echo "<div class='card'>";
                    echo "<a href='Product.php?id=" . $row["id"] . "'>";
                    echo "<img id='cardimg' src='" . $row["path"] . "' alt='Prodotto'>";
                    echo "</a>";
                    echo "<h3>" . $row["titolo"] . "</h3>";
                    echo "<p>Prezzo: " . $row["prezzo"] . "€</p>";
                    echo "</div>";
                    }
                }
            }
            ?>





        </div>
        


















        <?php


            if (isset($_SESSION["id"])) {
                $sqlControlloAdmin = "SELECT * FROM utente WHERE id=" . $_SESSION["id"];
                $resultControlloAdmin = $conn->query($sqlControlloAdmin);
                if ($resultControlloAdmin->num_rows > 0) {
                    while ($rowControlloAdmin = $resultControlloAdmin->fetch_assoc()) {
            
            
                        if ($rowControlloAdmin["admin"] == "1") {
                            echo '<a class="button" href="aggiungiProdotto.php">Admin:Aggiungi Prodotto</a>';

                        }
                    }
                }
            }

        ?>



    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>

</html>