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
        $this->immagine =array_key_exists( 'Immagine',$row) ? $_POST['Immagine'] : '' ; //nome file
        $strImmagine ="<img src='img/prodotti".$row["IMG"]."'>";
        return $row["Titolo"].$row["Marca"].$row["Prezzo"].$row["Descrizione"];$this->immagine;
    }

}
?>