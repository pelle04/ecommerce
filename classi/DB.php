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

    $query = 'SELECT * from prodotti where Titolo LIKE "%'. $str.'%"';

   /* $strCol = '';
    //var_dump($columns); die;
    foreach($columns as $colName) {
      $strCol .= ' '. esc($colName) . ',';
    }
    $strCol = substr($strCol, 0, -1);

    $query .= $strCol . ' FROM ' . $tableName . ' WHERE ' . 'Titolo LIKE "%'. $str.'%"';*/

    $result = mysqli_query($this->conn, $query);
    $resultArray = mysqli_fetch_all($result, MYSQLI_ASSOC);

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