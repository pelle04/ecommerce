<?php
include_once("functions.php");
class DB {

  private $conn;
  public $sqli;

  public function __construct() {
    
    global $conn;
    $this->conn = $conn;    
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);    //alias exit (die)
    }
    $this->sqli = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
  }

  public function query($sql) {
    $result = $this->sqli->query($sql);
    $data = $result->fetch_assoc(); 
    return $data;
  }

  public function login($passwordArg,$emailArg){
    session_start();
    $sql = "SELECT * from utenti where email=? and password=?";
    $stm = $this->conn->prepare($sql);
    $stm->bind_param("ss",$emailArg,$passwordArg);
    $email = $emailArg;
    $password = md5($passwordArg);

    $stm->execute();
    $result = $stm->get_result();
    if(mysqli_num_rows($result) == 1){
      $row = mysqli_fetch_assoc($result);
      //se accesso andato a buon fine setto la session email e la session loggato e mi manda all homepage  
      $_SESSION["email"] = $email;
      $_SESSION["nome"]= $row["Nome"];
      $_SESSION["loggato"] = true;
      $_SESSION["idUtente"] = $row["ID"];
      header('Location: index.php');
  
  }else{
    echo "errore";
  }
  }

  public function signin($passwordArg,$emailArg,$nomeArg,$cognomeArg,$dataNascitaArg){
    session_start();
    $admin = 0;
    $sql = "INSERT into utenti (Nome,Cognome,Admin,Password,Email,DataNascita) values(?,?,?,?,?,?)";
    $stm = $this->conn->prepare($sql);
    $stm->bind_param("ssissd",$nomeArg,$cognomeArg,$admin,$passwordArg,$emailArg,$dataNascitaArg);
    
    $result=$stm->execute();
    if($result){
      $_SESSION["loggato"]=true;  //fai l accesso e sei gia loggato 
      $_SESSION["nome"] = $_POST['nome'];
      $_SESSION["email"] = $_POST['email'];
      header("location: index.php");
    }else{
      echo "Error: " . $sql . "<br>" . $this->conn->error;
    }
  }


  public function select_all($tableName, $columns = array()) { // array perche chiedo piu parametri

    $query = 'SELECT ';

    $strCol = '';
    //var_dump($columns); die;
    foreach($columns as $colName) {
      $strCol .= ' '. esc($colName) . ',';
    }
    $strCol = substr($strCol, 0, -1);

    $query .= $strCol . ' FROM ' . $tableName;

    $result = mysqli_query($this->conn, $query);
    $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    return $resultArray;
  }

 public function select_like($tableName, $columns = array(), $str) {

    $query = 'SELECT * from articoli where Titolo LIKE "%'. $str.'%"';

    $result = mysqli_query($this->conn, $query);
    $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

    return $resultArray;
  }

  public function select_one($tableName, $columns = array(), $id) {

    $strCol = '';
    foreach($columns as $colName) {
      $colName = esc($colName);
      $strCol .= ' ' . $colName . ',';
    }
    $strCol = substr($strCol, 0, -1);
    $id = esc($id);
    $query = "SELECT $strCol FROM $tableName WHERE id = $id";

    $result = mysqli_query($this->conn, $query);
    $resultArray = mysqli_fetch_assoc($result);

    mysqli_free_result($result);

    return $resultArray;
  }





 public function delete_one($tableName, $id) {

    $id = esc($id);
    $query = "DELETE FROM $tableName WHERE id = $id";

    if (mysqli_query($this->conn, $query)) {
      $rowsAffected = mysqli_affected_rows($this->conn);

      return $rowsAffected;
    } else {

      return -1;
    }
  }

}

class DBManager {

  protected $db;
  protected $columns;
  protected $tableName;

  public function __construct(){
    $this->db = new DB();
  }

  public function getLike($str) {
    $results = $this->db->select_like($this->tableName, $this->columns,$str);
    $objects = array();
    foreach($results as $result) {
      array_push($objects, (object)$result);
    }
    return $objects;
  }

  public function getOne($str) {
    $results = $this->db->select_one($this->tableName, $this->columns,$str);
    $objects = array();
    foreach($results as $result) {
      array_push($objects, (object)$result);
    }
    return $objects;
  }
  
  public function get($id) {
    $resultArr = $this->db->select_one($this->tableName, $this->columns, (int)$id);
    return (object) $resultArr;
  }

  public function getAll() {
    $results = $this->db->select_all($this->tableName, $this->columns);
    $objects = array();
    foreach($results as $result) {
      array_push($objects, (object)$result);
    }
    return $objects;
  }



  public function delete($id) {
    $rowsDeleted = $this->db->delete_one($this->tableName, (int)$id);
    return (int) $rowsDeleted;
  }

  
}