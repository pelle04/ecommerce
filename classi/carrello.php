<?php
include("global.php");
function console_log(string $message)
{

    $file = fopen("log.log", "a");
    fwrite($file, $message . "\n");
    fclose($file);
}

class CartManager extends DBManager
{

    public function __construct()
    {
        parent::__construct();
        $this->columns = array('ID', 'Datac', 'IDUtente');
        $this->tableName = 'carrelli';
    }

    public function addToCart($idProdotto, $quantita)
    {
        console_log("add to cart");
        global $conn;
        $carrello = isset($_COOKIE['carrello']) ? unserialize($_COOKIE['carrello']) : []; //recupera il carrello dal cookie se è presente
        $idUtente = $_SESSION["idUtente"];
        $idCarrello = $this->getCarrelloID($idUtente);

        if (isset($carrello[$idProdotto])) {
            $carrello[$idProdotto] += $quantita;
            $conn->query("UPDATE contiene SET QuantitaContiene = (QuantitaContiene + {$carrello[$idProdotto]}) WHERE IDArticolo = $idProdotto AND IDCarrello = $idCarrello");

        } else {
            $carrello[$idProdotto] = $quantita;
            $conn->query("INSERT INTO contiene (IDArticolo, IDCarrello, QuantitaContiene) VALUES ($idProdotto, $idCarrello, $quantita)");
        }




        // Imposta il carrello come cookie per un'ora
        setcookie('carrello', serialize($carrello), time() + 3600, '/');

    }

    public function removeFromCart($idProdotto, $quantita)
    {
        $carrello = isset($_COOKIE['carrello']) ? unserialize($_COOKIE['carrello']) : []; //recupera il carrello dal cookie se è presente

        if (isset($carrello[$idProdotto])) {
            $carrello[$idProdotto] -= $quantita;
        }

        // Imposta il carrello come cookie per un'ora
        setcookie('carrello', serialize($carrello), time() + 3600, '/');
    }


    //in sottr
    private function refreshDBTogli($idCarrello, $carrello, $idUtente, $quantita)
    {
        global $conn;

        // Aggiungi i prodotti aggiornati al carrello nel database
        foreach ($carrello as $idProdotto => $quantita) {
            $query = "SELECT * FROM contiene WHERE IDCarrello = $idCarrello";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 0) {
                echo "Non puoi rimuovere, non c'è.";
            } else {
                // Rimuovi i record correlati nella tabella ordini
                $deleteOrdiniQuery = "DELETE FROM ordini WHERE IDCarrello = $idCarrello";
                mysqli_query($conn, $deleteOrdiniQuery);

                // Rimuovi i record nella tabella contiene
                $deleteQuery = "DELETE FROM contiene WHERE IDCarrello = $idCarrello";
                mysqli_query($conn, $deleteQuery);
            }

            $checkQuery = "SELECT * FROM carrelli WHERE ID = $idCarrello AND IDUtente = $idUtente";
            $result = mysqli_query($conn, $checkQuery);

            if (mysqli_num_rows($result) != 0) {
                // Rimuovi la riga nella tabella carrelli
                $deleteCarrelloQuery = "DELETE FROM carrelli WHERE ID = $idCarrello AND IDUtente = $idUtente";
                mysqli_query($conn, $deleteCarrelloQuery);
            } else {
                echo "Non puoi rimuovere, non c'è.";
            }
        }
    }




    //in aggiunta
    private function refreshDB($idCarrello, $carrello, $idUtente, $quantita)
    {
        global $conn;

        // Aggiungi i prodotti aggiornati al carrello nel database
        foreach ($carrello as $idProdotto => $quantita) {

            $query = "SELECT * FROM contiene WHERE IDCarrello = $idCarrello AND IDArticolo = $idProdotto";
            $result = mysqli_query($conn, $query)->fetch_all(MYSQLI_ASSOC);
            if (count($result) == 0) {
                console_log("IL RECORD NON ESISTE");
                // Il record non esiste, esegui l'inserimento
                $queryAggiungiContiene = "INSERT INTO contiene (QuantitaContiene, Commento, IDArticolo, IDCarrello) VALUES ($quantita, NULL, $idProdotto, $idCarrello)";
                mysqli_query($conn, $queryAggiungiContiene);
                console_log("CrEATO NUOVO RECORd");
            }

            $checkQuery = "SELECT * FROM carrelli WHERE ID = $idCarrello AND IDUtente = $idUtente";
            $result = mysqli_query($conn, $checkQuery)->fetch_all(MYSQLI_ASSOC);
            if (count($result) == 0) {
                console_log("IL RECORD NON ESISTE ESEGUO INSERIMENTO");
                // Il record non esiste, esegui l'inserimento
                $insertQuery = "INSERT INTO carrelli (ID, IDUtente) VALUES ($idCarrello, $idUtente)";
                mysqli_query($conn, $insertQuery);
                console_log("CrEATO NUOVO carrello");
            }

        }
    }

    public function controllaCookieCarrello($idUtente, $quantita, $segno)
    {
        if ($this->utenteEsiste($idUtente)) {
            // Verifica se il cookie del carrello è impostato
            if (isset($_COOKIE['carrello'])) {
                // Recupera i valori dal cookie
                $carrello = unserialize($_COOKIE['carrello']);

                // Esegui l'aggiornamento nel database
                $idCarrello = $this->getCarrelloID($idUtente);
                if ($segno == '-') {
                    $this->refreshDBTogli($idCarrello, $carrello, $idUtente, $quantita);
                } else {
                    $this->refreshDB($idCarrello, $carrello, $idUtente, $quantita);
                }
            }
        }
    }


    public function getTotalPrice($idProdotto)
    {
        global $conn;
        $sql = "SELECT * from contiene join articoli on contiene.IDArticolo = articoli.Codice where contiene.IDArticolo=" . $idProdotto . "";
        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            return $row['QuantitaContiene'] * $row["Prezzo"];
        }

    }

    private function utenteEsiste($idUtente)
    {
        global $conn;
        $idUtente = mysqli_real_escape_string($conn, $idUtente);
        $query = "SELECT ID FROM utenti WHERE ID = $idUtente";
        $result = mysqli_query($conn, $query);
        return mysqli_num_rows($result) > 0;
    }
    public function getCarrelloID($idUtente)
    {
        global $conn;

        // Query per ottenere l'ID del carrello
        $query = "SELECT ID FROM carrelli WHERE IDUtente = $idUtente";
        $result = mysqli_query($conn, $query);

        if ($row = mysqli_fetch_assoc($result)) {
            return $row['ID'];
        } else {
            // Creazione di un nuovo carrello per l'utente se non esiste
            $queryNuovoCarrello = "INSERT INTO carrelli (IDUtente) VALUES ($idUtente)";
            mysqli_query($conn, $queryNuovoCarrello);

            return mysqli_insert_id($conn);
        }
    }



    function visualizzaCarrello()
    {
        // Recupera il carrello dal cookie se presente
        $carrello = isset($_COOKIE['carrello']) ? unserialize($_COOKIE['carrello']) : [];

        // Array per salvare gli elementi del carrello
        $elementiCarrello = [];

        // Recupera la variabile globale $conn
        global $conn;

        // Recupera i dettagli dei prodotti presenti nel carrello
        foreach ($carrello as $idProdotto => $quantita) {
            // Esegue la query per recuperare i dettagli del prodotto dal database
            $query = "SELECT * FROM articoli WHERE Codice = '$idProdotto'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                // Ottiene i dettagli del prodotto dalla riga risultato
                $row = mysqli_fetch_assoc($result);

                // Crea un array con i dettagli del prodotto
                $dettagliProdotto = [
                    'Codice' => $row['Codice'],
                    'Titolo' => $row['Titolo'],
                    'Autore' => $row['Autore'],
                    'Marca' => $row['Marca'],
                    'Prezzo' => $row['Prezzo'],
                    'Descrizione' => $row['Descrizione'],
                    'Quantita' => $quantita,
                    'IDCategoria' => $row['IDCategoria'],
                    'DataAggiunta' => $row['DataAggiunta'],
                    'IMG' => $row['IMG']
                ];

                // Aggiunge i dettagli del prodotto all'array degli elementi del carrello
                $elementiCarrello[] = $dettagliProdotto;
            }
        }

        // Restituisce l'array con gli elementi del carrello
        $objects = array();
        foreach ($elementiCarrello as $elemento) {
            array_push($objects, (object) $elemento);
        }
        return $objects;
    }

    public function checkOut($idUtente)
    {
        global $conn;

        // Inizia la transazione
        mysqli_begin_transaction($conn);

        try {
            // Recupera il carrello dell'utente dal database
            $queryCarrello = "SELECT * FROM carrelli WHERE IDUtente = $idUtente";
            $resultCarrello = mysqli_query($conn, $queryCarrello);

            if (mysqli_num_rows($resultCarrello) == 0) {
                throw new Exception("Il carrello dell'utente non è stato trovato.");
            }

            // Calcola il totale dell'ordine
            $totale = 0;

            // Esegue il checkout dei prodotti presenti nel carrello
            while ($rowCarrello = mysqli_fetch_assoc($resultCarrello)) {
                $idCarrello = $rowCarrello['ID'];

                // Recupera i prodotti presenti nel carrello
                $queryProdottiCarrello = "SELECT * FROM contiene WHERE IDCarrello = $idCarrello";
                $resultProdottiCarrello = mysqli_query($conn, $queryProdottiCarrello);

                if (mysqli_num_rows($resultProdottiCarrello) == 0) {
                    throw new Exception("Nessun prodotto presente nel carrello.");
                }

                // Esegue il checkout di ciascun prodotto
                while ($rowProdottoCarrello = mysqli_fetch_assoc($resultProdottiCarrello)) {
                    $idProdotto = $rowProdottoCarrello['IDArticolo'];
                    $quantita = $rowProdottoCarrello['QuantitaContiene'];

                    // Controlla se il prodotto è disponibile
                    $queryControlloQuantita = "SELECT * FROM articoli WHERE Codice = $idProdotto";
                    $resultControlloQuantita = mysqli_query($conn, $queryControlloQuantita);

                    if (mysqli_num_rows($resultControlloQuantita) == 0) {
                        throw new Exception("Il prodotto $idProdotto non è disponibile.");
                    }

                    $rowArticolo = mysqli_fetch_assoc($resultControlloQuantita);
                    $quantitaArticolo = $rowArticolo['Quantita'];

                    if ($quantita > $quantitaArticolo) {
                        throw new Exception("Quantità insufficiente del prodotto $idProdotto disponibile.");
                    }

                    // Aggiorna la quantità del prodotto
                    $nuovaQuantitaArticolo = $quantitaArticolo - $quantita;
                    $updateArticolo = "UPDATE articoli SET Quantita = $nuovaQuantitaArticolo WHERE Codice = $idProdotto";
                    mysqli_query($conn, $updateArticolo);

                    // Calcola il prezzo del prodotto e aggiungi al totale dell'ordine
                    $prezzoProdotto = $rowArticolo['Prezzo'];
                    $totale += $prezzoProdotto * $quantita;
                }

                // Svuota il carrello
                $deleteCarrello = "DELETE FROM contiene WHERE IDCarrello = $idCarrello";
                mysqli_query($conn, $deleteCarrello);
            }

            // Registra l'ordine
            $dataOrdine = date('Y-m-d');
            $insertOrdine = "INSERT INTO ordini (Data, Prezzo, IDCarrello) VALUES ('$dataOrdine', $totale, $idCarrello)";
            mysqli_query($conn, $insertOrdine);

            // Conferma la transazione
            mysqli_commit($conn);

            // Restituisce true se il checkout è stato completato con successo
            return true;
        } catch (Exception $e) {
            // Annulla la transazione
            mysqli_rollback($conn);
            return false;
        }
    }
}














class CartItemManager extends DBManager
{

    public function __construct()
    {
        parent::__construct();
        $this->columns = array('QuantitaContiene', 'Commento', 'IDArticolo', 'IDCarrello');
        $this->tableName = 'contiene';
    }
}

?>