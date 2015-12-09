<?php
class Valid {
  
  protected $inputs = array(
      "surname" => array("/[\pL\'\-]{2,32}/", 2, 32),
      "name" => array("/[\pL]{2,32}/", 2, 32),
      "patronymic" => array("/[\pL]{2,32}/", 2, 32),
      "email" => array("/^[\w\-]+@([\w\-]+\.)+[a-z]{2,6}$/", 8, 32, 'required'),
      "phone" => array("/^\+?[\d\s\(\)\-]{6,16}$/", 6, 32),
      "login" => array("/[\w\-\_]{6,32}/", 6, 32, 'required'),
      "passw" => array("/[\w\-\_]{6,32}/", 6, 32, 'required'),
      "confirm" => array("/[\w\-\_]{6,32}/", 6, 32, 'required'),
      "comment" => array("/\.{0,255}/", 0, 255)
  );
  protected $error = array();
  protected $request = array();
  protected $valid = true;
      
  public function __construct($validate = true) {
    if ($validate === false){
      $this->clear();
      return;
    }
    foreach ($this->inputs as $key=>$val){
      $this->request[$key] = filter_input(INPUT_POST, $key);
      if (empty($this->request[$key])){
        if (in_array('required', $val)){
          $this->error[$key] = 'errorEmptyField';
          $this->valid = false;
          continue;
        } else {
          $this->error[$key] = '';
          continue;
        }
      }
      if (strlen($this->request[$key]) < $val[1]){
        $this->error[$key] = 'errorShortField';
        $this->valid = false;
        continue;
      } 
      if (strlen($this->request[$key]) > $val[2]){
        $this->error[$key] = 'errorLongField';
        $this->valid = false;
        continue;
      }
      if (preg_match($val[0], $this->request[$key])){
        $this->error[$key] = '';
      } else {
        $this->error[$key] = 'errorInvalidFormat';
        $this->valid = false;
      }
    }
    if ($this->request['passw'] !== $this->request['confirm']){
      $this->error['confirm'] = 'errorConfirm';
      $this->valid = false;
    }
  }
  
  public function clear(){
    foreach (array_keys($this->inputs) as $key){
      $this->error[$key] = '';
      $this->request[$key] = '';
    }
  }
  
  public function errorText($text){
    foreach ($this->error as $key=>$val){
      $errorText[$key] = sprintf($text[$val], $this->inputs[$key][1]);
    }
    return $errorText;
  }
  
  public function __get($propertyName) {
    if (isset($this->$propertyName)) {
      return $this->$propertyName;
    } else {
      return false;
    }
  }
}