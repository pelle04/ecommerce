<?php
class carrello{
    public $Datac;
   // public $Autore;
    public $IDUtente;

    function print($row){
        $this->Datac = $row["Datac"];
        $this->IDUtente = $row["IDUtente"];
        return $row["Datac"].$row["IDUtente"];
    }

}
?>