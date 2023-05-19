<?php
session_start();
include("Connection.php");
if (!isset($_SESSION["id"])) {
    header("location: AccountRedirect.php");
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
        if(isset($_SESSION["id"])){
        $data = date("Y-m-d");
        $idutente = $_SESSION['id'];

        $ricercaCarrelli = "SELECT * from carrello where IdUtente=" . $idutente . " AND data='" . $data . "'";
        $resultricercaCarrelli = $conn->query($ricercaCarrelli);
        if ($resultricercaCarrelli->num_rows > 0) {

            while ($rowricercaCarrelli = $resultricercaCarrelli->fetch_assoc()) {
                $idcarrello = $rowricercaCarrelli["id"];
                $prodottiCarrello = "SELECT * from contiene as c join prodotto as p on c.IdProdotto=p.id join foto on p.IdFoto=idf join categoria on p.IdCategoria=idc where c.IdCarrello=" . $idcarrello;
               // echo $prodottiCarrello;
                $resultricercaProdotti = $conn->query($prodottiCarrello);
                if ($resultricercaProdotti->num_rows > 0) {
                    while ($rowricercaProdotti = $resultricercaProdotti->fetch_assoc()) {
                        echo "<div class='card'>";
                        echo "<a href='Product.php?id=" . $rowricercaProdotti["id"] . "'>";
                        echo "<img src='" . $rowricercaProdotti["path"] . "' alt='Prodotto'>";
                        echo "</a>";
                        echo "<h3>" . $rowricercaProdotti["titolo"] . "</h3>";
                        echo "<p>Prezzo: " . $rowricercaProdotti["prezzo"] . "€</p>";
                        echo "<a href='checkOut.php?id=".$rowricercaProdotti['id']."&idCarrello=".$idcarrello."'>checkout</a>";
                        echo "<a href='rimuoviProdotto.php?idcontiene=".$rowricercaProdotti["id"]."'><p>Rimuovi Prodotto</p></a>";
                        echo "</div>";
                    }
                } else {
                    echo "non ci sono prodotti";
                }
            }
        } else {
            echo "<div>";
            echo "<h4 >Carrello vuoto</h4>";
            echo "</div>";
        }
    }else{
        header("location: AccountRedirect.php");

    }
        ?>
    </div>
</body>

</html>