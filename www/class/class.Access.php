<?php
class Access {
  
  protected $accessType;
  protected $login;
  protected $name;
  protected $passwrd;
      
  public function __construct($db) {
    if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'quilt'){
      goto guest;
    }
    if (isset($_COOKIE['userlogin']) && isset($_COOKIE['userpasswrd'])){
      $this->login = $_COOKIE['userlogin'];
      $this->passwrd = $_COOKIE['userpasswrd'];
    } elseif (empty($_POST['userlogin']) || empty($_POST['userpasswrd'])) {
      goto guest;
    } else {
      $this->login = $_POST['userlogin'];
      $this->passwrd = md5($_POST['userpasswrd']);
    }
    $this->accessType = $this->login;//$db->getAccessType($this->login, $this->passwrd);
    if ($this->accessType){
      setcookie('userlogin', $this->login);
      setcookie('userpasswrd', $this->passwrd);
      return;
    } else {
      goto guest;
    }
    guest:
    setcookie('userlogin', false);
    setcookie('userpasswrd', false);
    $this->accessType = 'guest';
    $this->name = 'Guest';
    return;
  }

  public function __get($propertyName) {
    if (!$this->$propertyName) {
      throw new Exception('Недопустимое значение свойства!');
    } else {
      return $this->$propertyName;
    }
  }
}