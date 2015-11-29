<?php
class Lang {
  
  public $text;
  protected $lang;
  protected $langList = array('RU','EN');
  protected $textRU = array(
      'Exit' => 'Выход',
      'admin.php' => 'Администратору',
      'driver.php' => 'Водителю',
      'From' => 'Откуда',
      'Licence' => 'Лицензия',
      'index.php' => 'Главная',
      'On a map' => 'На карте',
      'registration.php' => 'Регистрация',
      'Rules' => 'Правила',
      'Tariff' => 'Тарифы',
      'order.php' => 'Заказ такси',
      'To' => 'Куда'
  );
  protected $textEN = array(
      'Exit' => 'Exit',
      'admin.php' => 'Admin',
      'driver.php' => 'Driver',
      'From' => 'From',
      'Licence' => 'Licence',
      'index.php' => 'Main',
      'On a map' => 'Map',
      'registration.php' => 'Registration',
      'Rules' => 'Rules',
      'Tariff' => 'Tariff',
      'order.php' => 'Taxi order',
      'To' => 'To'
  );
    
  public function __construct() {
    $this->lang = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'RU';
    $this->text = $this->{'text'.$this->lang};
  }
   
  public function __get($propertyName) {
    if (!$this->$propertyName) {
      throw new Exception('Недопустимое значение свойства!');
    } else {
      return $this->$propertyName;
    }
  }
}