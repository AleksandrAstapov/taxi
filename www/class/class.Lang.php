<?php
class Lang {
  
  public $text;
  protected $lang;
  protected $langList = array('RU','EN');
  protected $textRU = array(
      '' => '',
      'admin.php' => 'Администратору',
      'Comment' => 'Комментарий',
      'Confirm' => 'Подтверждение пароля', 
      'driver.php' => 'Водителю',
      'Email' => 'Электронная почта',     
      'Enter' => 'Вход',
      'errorConfirm' => 'Пароли не совпадают',
      'errorEmptyField' => 'Это поле не может быть пустым',
      'errorInvalidFormat' => 'Неверный формат',
      'errorLongField' => 'Это поле должно содержать не более %d символов',
      'errorShortField' => 'Это поле должно содержать не менее %d символов',
      'Exit' => 'Выход',
      'From' => 'Откуда',
      'Licence' => 'Лицензия',
      'Login' => 'Логин',
      'LoginHelp' => 'Логин может содержать английские и русские буквы, цыфры, знак подчёркивания',
      'LostPassword' => 'Забыли пароль',
      'index.php' => 'Главная',
      'Name' => 'Имя',
      'NameHelp' => 'Имя может содержать английские и русские буквы',
      'On a map' => 'На карте',
      'Password' => 'Пароль',
      'PasswordHelp' => 'Пароль может содержать английские и русские буквы, цыфры, знак подчёркивания',
      'Patronymic' => 'Отчество',
      'PatronymicHelp' => 'Отчество может содержать английские и русские буквы',
      'Phone' => 'Номер телефона',
      'PhoneHelp' => 'В номере телефона помимо цифр допускаются скобки, дефисы и пробелы', 
      'Registration' => 'Регистрация',
      'registration.php' => 'Регистрация',
      'RegNotice' => 'Поля, отмеченные символом *, обязательны для заполения',
      'Rules' => 'Правила',
      'Surname' => 'Фамилия',
      'SurnameHelp' => 'Фамилия может содержать английские и русские буквы, дэфис, апостаф',
      'Tariff' => 'Тарифы',
      'order.php' => 'Заказ такси',
      'To' => 'Куда'
  );
  protected $textEN = array(
      '' => '',
      'admin.php' => 'Admin',
      'Comment' => 'Comment',
      'Confirm' => 'Password confirmation',
      'driver.php' => 'Driver',
      'Email' => 'E-mail', 
      'Enter' => 'Enter',
      'errorConfirm' => 'Passwords do not match',
      'errorEmptyField' => 'This field must not be empty',
      'errorInvalidFormat' => 'Invalid format',
      'errorLongField' => 'This field should have no more than %d characters',
      'errorShortField' => 'This field should have at least %d characters',
      'Exit' => 'Exit',
      'From' => 'From',
      'Licence' => 'Licence',
      'Login' => 'Login',
      'LoginHelp' => 'Login can contain English and Russian letters, numbers, underscore',
      'LostPassword' => 'Forgot your password',
      'index.php' => 'Main',
      'Name' => 'Name',
      'NameHelp' => 'Name may contain English and Russian letters',
      'On a map' => 'Map',
      'Password' => 'Password',
      'PasswordHelp' => 'Password can contain English and Russian letters, numbers, underscore',
      'Patronymic' => 'Patronymic',
      'PatronymicHelp' => 'Patronymic may contain English and Russian letters',
      'Phone' => 'Phone number',
      'PhoneHelp' => 'In addition to the digits in the phone number allowed parentheses, hyphens and spaces', 
      'Registration' => 'Registration',
      'registration.php' => 'Registration',
      'RegNotice' => 'Fields marked * are required',
      'Rules' => 'Rules',
      'Surname' => 'Surname',
      'SurnameHelp' => 'Surname may contain English and Russian letters, hyphen, apostrophe',
      'Tariff' => 'Tariff',
      'order.php' => 'Taxi order',
      'To' => 'To'
  );
    
  public function __construct() {
    $this->lang = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'RU';
    $this->text = $this->{'text'.$this->lang};
  }
   
  public function __get($propertyName) {
    if (isset($this->$propertyName)) {
      return $this->$propertyName;
    } else {
      return false;
    }
  }
}