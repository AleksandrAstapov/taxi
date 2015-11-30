<?php
class Access {
  
  protected $accessType;
  protected $login;
  protected $name;
  protected $password;
      
  public function __construct($db) {
    if (isset($_COOKIE['userlogin']) && isset($_COOKIE['userpassword'])){
      $this->login = $_COOKIE['userlogin'];
      $this->password = $_COOKIE['userpassword'];
    } elseif (empty($_POST['userlogin']) || empty($_POST['userpassword'])) {
      $this->guilt();
      return;
    } else {
      $this->login = $_POST['userlogin'];
      $this->password = md5($_POST['userpassword']);
    }
    $response = $db->authorization($this->login,$this->password);
    if ($response){
      list($this->name, $this->accessType) = $response;
      setcookie('userlogin', $this->login);
      setcookie('userpassword', $this->password);
    } else {
      $this->guilt();
    }
  }
  
  public function guilt(){
    setcookie('userlogin', false);
    setcookie('userpassword', false);
    $this->accessType = 'guest';
    $this->name = 'Гость';
  }

  public function __get($propertyName) {
    if (isset($this->$propertyName)) {
      return $this->$propertyName;
    } else {
      return false;
    }
  }
}