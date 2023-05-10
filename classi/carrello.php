<?php 
include("global.php");
class CartManager extends DBManager {

    public function __construct(){
      parent::__construct();
      $this->columns = array( 'ID', 'Datac', 'IDUtente');
      $this->tableName = 'carrelli';
    }

    public function addToCart($idProdotto,$quantita){
        $carrello = isset($_COOKIE['carrello']) ? json_decode($_COOKIE['carrello'], true) : []; //recupera il carrello dal cookie se è presente

         if (isset($carrello[$idProdotto])) {
             $carrello[$idProdotto] += $quantita;
         } else {
             $carrello[$idProdotto] = $quantita;
        }

            // Imposta il carrello come cookie per un'ora
        setcookie('carrello', json_encode($carrello), time() + 3600, '/');

    }

    public function removeFromCart($idProdotto){
        $carrello = isset($_COOKIE['carrello']) ? json_decode($_COOKIE['carrello'], true) : [];
        if (isset($carrello[$idProdotto])) {
            unset($carrello[$idProdotto]);
    
            // Imposta il carrello aggiornato come cookie
            setcookie('carrello', json_encode($carrello), time() + 3600, '/');
        }
    }


    private function refreshDB($idCarrello, $carrello ,$idUtente,$quantita) {
        global $conn;
        // Rimuovi i prodotti precedenti dal carrello nel database
     //   $queryRimuovi = "DELETE FROM carrelli WHERE ID = $idCarrello";
      //  mysqli_query($conn, $queryRimuovi);

        // Aggiungi i prodotti aggiornati al carrello nel database
        foreach ($carrello as $idProdotto => $quantita) {
            
            $query = "SELECT * FROM contiene WHERE IDCarrello = $idCarrello";
            $result = mysqli_query($conn, $query);        
            if (mysqli_num_rows($result) == 0) {
                // Il record non esiste, esegui l'inserimento
                $queryAggiungiContiene = "INSERT INTO contiene (QuantitaContiene,Commento,IDArticolo,IDCarrello) VALUES ($quantita,NULL,$idProdotto,$idCarrello)";
                mysqli_query($conn, $queryAggiungiContiene);
            }else{
                echo "Errore: Il record esiste già nel database.";
            }
            $checkQuery = "SELECT * FROM carrelli WHERE ID = $idCarrello AND IDUtente = $idUtente";
            $result = mysqli_query($conn, $checkQuery);
            if (mysqli_num_rows($result) == 0) {
                // Il record non esiste, esegui l'inserimento
                $insertQuery = "INSERT INTO carrelli (ID, IDUtente) VALUES ($idCarrello, $idUtente)";
                mysqli_query($conn, $insertQuery);
            } else {
                echo "Errore: Il record esiste già nel database.";
            }

        }
    }

    public function controllaCookieCarrello($idUtente,$quantita) {
        if ($this->utenteEsiste($idUtente)) {
            // Verifica se il cookie del carrello è impostato
            if (isset($_COOKIE['carrello'])) {
                // Recupera i valori dal cookie
                $carrello = json_decode($_COOKIE['carrello'], true);
    
                // Esegui l'aggiornamento nel database
                $idCarrello = $this->getCarrelloID($idUtente);
                $this->refreshDB($idCarrello, $carrello,$idUtente,$quantita);
            }
        }
    }


    public function getTotalPrice($idProdotto){
        global $conn;
        $sql = "SELECT * from contiene join articoli on contiene.IDArticolo = articoli.Codice where contiene.IDArticolo=".$idProdotto."";
        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            return $row['QuantitaContiene']*$row["Prezzo"];
        }

    }

    private function utenteEsiste($idUtente) {
        global $conn;
        $idUtente = mysqli_real_escape_string($conn, $idUtente);
        $query = "SELECT ID FROM utenti WHERE ID = $idUtente";
        $result = mysqli_query($conn, $query);
        return mysqli_num_rows($result) > 0;
    }
    private function getCarrelloID($idUtente) {
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



    function visualizzaCarrello() {
        // Recupera il carrello dal cookie se presente
        $carrello = isset($_COOKIE['carrello']) ? json_decode($_COOKIE['carrello'], true) : [];
    
        // Array per salvare gli elementi del carrello
        $elementiCarrello = [];
    
        // Recupera la variabile globale $conn
        global $conn;
    
        // Recupera i dettagli dei prodotti presenti nel carrello
        foreach ($carrello as $idProdotto => $quantita) {
            // Esegue la query per recuperare i dettagli del prodotto dal database
            $query = "SELECT * FROM articoli WHERE Codice = $idProdotto";
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
        foreach($elementiCarrello as $elemento){
            array_push($objects,(object)$elemento);
        }
        return $objects;
    }
  }


  class CartItemManager extends DBManager {

    public function __construct(){
      parent::__construct();
      $this->columns = array( 'QuantitaContiene', 'Commento', 'IDArticolo', 'IDCarrello');
      $this->tableName = 'contiene';
    }
  }

?>