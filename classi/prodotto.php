<?php
include_once("DB.php");
class Product {

  public $Codice;
  public $Titolo;
  public $Prezzo;
  public $Descrizione;
  public $IDCategoria;
  public $Marca;
  public $Autore;
  public $Quantita;
  public $IMG;

   public function __construct($Codice, $Titolo, $Autore, $Marca, $Prezzo, $Descrizione,$quantita,$IDCategoria,$IMG){
    $this->Codice = (int)$Codice;
    $this->Titolo = $Titolo;
    $this->Prezzo = (float)$Prezzo;
    $this->Descrizione = $Descrizione;
    $this->IDCategoria = (int)$IDCategoria;
    $this->Marca = $Marca;
    $this->Autore=$Autore;
    $this->IMG =$IMG;
    $this->Quantita=$quantita;
  }
}

class ProductManager extends DBManager {

  public function __construct(){
    parent::__construct();
    $this->columns = array( 'Codice', 'Titolo', 'Autore', 'Marca', 'Prezzo', 'Descrizione', 'Quantita', 'IDCategoria', 'IMG', 'deleted');
    $this->tableName = 'articoli';
  }
}