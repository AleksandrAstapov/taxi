<?php
class DataBase {
  
  const DBNAME = 'taxi';
  const HOST = 'localhost';
  private $user = 'taxiUser';
  private $password = 'XAM7fOn8Me';

  public function authorization($login,$passwrd){
    $conn = new mysqli(self::HOST, $this->user, $this->password, self::DBNAME);
    $sql = "SELECT `name`,`access` FROM `users` ".
        "WHERE `login`='$login' AND `password`='$passwrd';";
    $result = $conn->query($sql);
    if ($result){
      return $result->fetch_row();
    } else {
      return false;
    }
    $conn->close();
  }
    
  public function __construct() {
  }
   
  public function __get($propertyName) {
    if (isset($this->$propertyName)) {
      return $this->$propertyName;
    } else {
      return false;
    }
  }
}