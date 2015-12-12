<?php
class Valid {
    
  protected $db;
  protected $error = array();
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
  protected $request = array();
  protected $text;
  protected $valid = true;
      
  public function __construct($db,$text) {
    $this->db = $db;
    $this->text = $text;
  }
  
  public function __get($propertyName) {
    if (isset($this->$propertyName)) {
      return $this->$propertyName;
    } else {
      return false;
    }
  }  
    
  public function clear(){
    foreach (array_keys($this->inputs) as $key){
      $this->error[$key] = '';
      $this->request[$key] = '';
    }
  }
  
  public function errorText(){
    foreach ($this->error as $key=>$val){
      $errorText[$key] = sprintf($this->text[$val], $this->inputs[$key][1]);
    }
    return $errorText;
  }
  
  public function sendMail(){
    $server = filter_input(INPUT_SERVER,'SERVER_NAME');
    $port = filter_input(INPUT_SERVER,'SERVER_PORT');
    $to  = $this->request['email'];
    $subject = $this->text['regMailSubject'];
    $message = "<html>"
        . "<head>"
        . "<title>{$this->text['regMailSubject']}</title>"
        . "</head>"
        . "<body>"
        . "<p>{$this->text['regMailP1']}</p>"
        . "<p>{$this->text['regMailP2']} $server</p>"
        . "<p>{$this->text['regMailP3']}</p>"
        . "<p><a href=\"http://$server:$port/index.php?"
            . "action=confirm&"
            . "user={$this->request['login']}&"
            . "key=" . md5($this->request['passw'])
            . "\">{$this->text['regMailSubject']}</a></p>"
        . "</body>"
        . "</html>"; 
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= "To: {$this->request['name']} <$to>" . "\r\n";
    return mail($to, $subject, $message, $headers);
  }
  
  public function validate(){
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
    if ($this->db->isEmailInDB($this->request['email'])) {
      $this->error['email'] = 'errorEmail';
      $this->valid = false;
    }
    if ($this->db->isUserInDB($this->request['login'],md5($this->request['passw']))) {
      $this->error['login'] = 'errorLogin';
      $this->valid = false;
    }
    if ($this->request['passw'] !== $this->request['confirm']){
      $this->error['confirm'] = 'errorConfirm';
      $this->valid = false;
    }
    if ($this->valid){
      return $this->sendMail();
    } else {
      return false;
    }
  }
}