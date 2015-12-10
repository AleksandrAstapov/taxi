<?php
class Access {
  
  protected $accessType;
  protected $login;
  protected $email;
  protected $name;
  protected $page;
  protected $password;
      
  public function __construct($db) {
    $this->page = basename(filter_input(INPUT_SERVER,'PHP_SELF'));
    //
    if (($log = filter_input(INPUT_COOKIE,'userlogin')) 
        && ($pas = filter_input(INPUT_COOKIE,'userpassw'))) {
      $this->login = $log;
      $this->password = $pas;
    } elseif (($log = filter_input(INPUT_POST,'userlogin')) 
        && ($pas = filter_input(INPUT_POST,'userpassw'))) {
      $this->login = $log;
      $this->password = md5($pas);
    } else {
      $this->guilt();
      return;
    }
    $response = $db->isUserInDB($this->login,$this->password);
    if ($response){
      list($this->name, $this->accessType, $this->email) = $response;
      setcookie('userlogin', $this->login);
      setcookie('userpassw', $this->password);
    } else {
      $this->guilt();
    }
  }
  
  public function guilt(){
    setcookie('userlogin', false);
    setcookie('userpassw', false);
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