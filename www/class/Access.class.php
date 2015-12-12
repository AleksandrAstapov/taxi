<?php
class Access {
  
  protected $accessType = 'guest';
  protected $db;
  protected $login;
  protected $name;
  protected $page;
  protected $password;
      
  public function __construct($db) {
    $this->db = $db;
    $this->page = basename(filter_input(INPUT_SERVER,'PHP_SELF'));
    //
    if (filter_input(INPUT_POST, 'action') === 'quilt') {
      $this->guilt();
      return;
    }
    if (($log = filter_input(INPUT_COOKIE,'userlogin')) 
        && ($pas = filter_input(INPUT_COOKIE,'userpassw'))) {
      $this->login = $log;
      $this->password = $pas;
    } elseif (($log = filter_input(INPUT_POST,'userlogin')) 
        && ($pas = filter_input(INPUT_POST,'userpassw'))) {
      $this->login = $log;
      $this->password = md5($pas);
    }
    $this->enter();
  }

  public function __get($propertyName) {
    if (isset($this->$propertyName)) {
      return $this->$propertyName;
    } else {
      return false;
    }
  } 
  
  public function enter($get=''){
    if ($get === 'get' 
        && ($log = filter_input(INPUT_GET,'user')) 
        && ($pas = filter_input(INPUT_GET,'key'))) {
      $this->login = $log;
      $this->password = $pas;
    }
    if (!$this->login && !$this->password){
      return;
    }
    $response = $this->db->isUserInDB($this->login,$this->password);
    if ($response){
      list($this->name, $this->accessType) = $response;
      setcookie('userlogin', $this->login);
      setcookie('userpassw', $this->password);
    }
  }
  
  public function guilt(){
    $this->accessType = 'guest';
    $this->login = false;
    $this->name = 'Гость';
    $this->password = false;
    setcookie('userlogin', $this->login);
    setcookie('userpassw', $this->password);
  }
}