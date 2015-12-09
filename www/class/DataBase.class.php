<?php
class DataBase {
  
  const DBNAME = 'taxi';
  const HOST = 'localhost';
  private $id;
  private $password = 'XAM7fOn8Me';
  private $user = 'taxiUser';

  public function addUser($data){
    $conn = new mysqli(self::HOST, $this->user, $this->password, self::DBNAME);
    $sql = "INSERT INTO `users` "
        . "(`surname`,`name`,`patronymic`,`email`,`phone`,`comment`,`login`,`password`,`access`)"
        . "VALUES ('{$data['surname']}','{$data['name']}','{$data['patronymic']}',"
        . "'{$data['email']}','{$data['phone']}','{$data['comment']}','{$data['login']}',"
        . md5($data['passw']) . "'user')";
    $conn->query($sql);
    $conn->close();
    return ($conn->affected_rows > 0) ? true : false;
  }
    
  public function authorization($login,$passw){
    $conn = new mysqli(self::HOST, $this->user, $this->password, self::DBNAME);
    $sql = "SELECT `id`,`name`,`access` FROM `users` ".
        "WHERE `login`='$login' AND `password`='$passw';";
    $result = $conn->query($sql);
    $conn->close();
    if ($result){
      $resArr = $result->fetch_row();
      $this->id = array_shift($resArr);
      return $resArr;
    } else {
      return false;
    }
  }
    
  public function isEmailInDB($email){
    $conn = new mysqli(self::HOST, $this->user, $this->password, self::DBNAME);
    $sql = "SELECT `id` FROM `users` WHERE `email`='$email';";
    $result = $conn->query($sql);
    $conn->close();
    return ($result->num_rows > 0) ? true : false;
  }
     
  public function __get($property) {
    if (isset($this->$property)) {
      return $this->$property;
    } else {
      return false;
    }
  }
}