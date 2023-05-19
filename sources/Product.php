<?php
session_start();
include("Connection.php");
if (isset($_SESSION["id"])) {
    $sqlControlloAdmin = "SELECT * FROM utente WHERE id=" . $_SESSION["id"];
    $resultControlloAdmin = $conn->query($sqlControlloAdmin);
    if ($resultControlloAdmin->num_rows > 0) {
        while ($rowControlloAdmin = $resultControlloAdmin->fetch_assoc()) {


            if ($rowControlloAdmin["admin"] == "1") {
                $admin = true;
            }
        }
    }
}

?>



<html>

<head>
    <title>MainPage</title>
    <link rel="stylesheet" href="">
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
        <?php
        $id = $_GET["id"];
        $sql = "SELECT * from prodotto as p join foto as f on p.IdFoto=idf join categoria as c on p.IdCategoria=idc where p.id=" . $id;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if(isset($_SESSION['admin']) && $_SESSION['admin']==1){
                 echo '<a class="button" href="modificaProdotto.php?id='.$row['id'].'">Admin: modifica Prodotto</a>';               
                 }  
                echo "<div class='product'>";
                echo "<form action='AddCart.php' method='get'>";
                $_SESSION["idProdCarrello"] = $row["id"];

                echo "<img src='" . $row['path'] . "' alt='Prodotto'>";
                echo "<h3>" . $row['titolo'] . "</h3>";
                echo "<p>" . $row['descrizione'] . "</p>";
                echo "<p>Prezzo: " . $row['prezzo'] . "€</p>";
                echo '<input type="number" name="quantita" id="quantita" min="0" max="' . $row["quantitaMag"] . '" step="1"><br><br>';
                echo "<button>Add to Cart</button><br><br>";
                echo '</form>';



                echo "</div>";
                echo "<div>";


                echo '<h3>Commenti</h3>';
                echo '<a href="addCommento.php?idprodotto=' . $row["id"] . '"class="button">Scrivi un commento...</a>';
                echo '<br><br>';


                $sql2 = "SELECT * from commento as c join utente as u on c.IdUtente=u.id join prodotto as p on c.IdProdotto =p.id where p.id= " . $id;
                $result = $conn->query($sql2);
                if ($result->num_rows > 0) {
                    echo '<table id="commenti">';
                    echo '<thead><tr><th>Nome</th>';
                    echo '<th>Cognome</th>';
                    echo '<th>Stelle</th>';
                    echo '<th>Descrizione</th></tr></thead><tbody>';
                    while ($row = $result->fetch_assoc()) {


                        echo '<tr>';
                        echo '<td>' . $row["nome"] . '</td>';
                        echo '<td>' . $row["cognome"] . '</td>';
                        echo '<td>';
                        for ($i = 0; $i < $row["stelle"]; $i++) {
                            echo "&#9734;";
                        }
                        echo "</td>";



                        echo '<td>' . $row["text"] . '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table>';
                } else {
                    echo '<p>Ancora nessun commento...</p>';
                }
            }
        } else echo "ERRORE";


        echo "</div>";


        ?>


    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>