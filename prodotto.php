<?php
class prodotto{
    public $Titolo;
   // public $Autore;
    public $Marca;
    public $Prezzo;
    public $Descrizione;
 //  public $Quantita;
 //   public $Categoria;
    public $immagine;

    function print($row){
        $this->Titolo = $row["Titolo"];
        $this->Marca = $row["Marca"];
        $this->Prezzo = $row["Prezzo"];
        $this->Descrizione = $row["Descrizione"];
        $this->immagine = $row["Immagine"];

        return $row["Titolo"].$row["Marca"].$row["Prezzo"].$row["Descrizione"].$row["Immagine"];
    }

}
?>