<?php

include_once './class/class.Access.php';
include_once './class/class.Lang.php';

$objAccess = new Access('db');
$accessType = $objAccess->accessType;

$objLang = new Lang;
$text = $objLang->text;

$page = basename($_SERVER['PHP_SELF']);
include_once 'html_header.php';

?>

<section class="row">

  <!-- Форма авторизации -->
  <div class="col-sm-4 col-xs-12">
    <form role="form" method="POST">
      <div class="form-group has-feedback">
        <label for="login">Логин</label>
        <input id="login" class="form-control" type="text" name="userlogin">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <span class="help-block"></span>
      </div>
      <div class="form-group has-feedback">
        <label for="passw">Пароль</label>
        <input id="passw" class="form-control" type="password" name="userpasswrd">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <span class="help-block"></span>
      </div>
      <div class="form-group">
        <button class="btn btn-primary btn-lg" type="submit">
          Вход <span class="glyphicon glyphicon-play"></span>
        </button>
        <a class="btn btn-link btn-lg pull-right" href="./lostPassword.php">
          Забыли пароль?
        </a>
      </div>
    </form>
  </div>

  <!-- Приветствие -->
  <div class="col-sm-8 col-xs-12">
    <div class="jumbotron">
      <h2 class="text-primary">Приветствуем Вас, Гость!</h2>
      <p class="lead">Благодарим за выбор нашей службы такси.</p>
      <p class="lead">Мы довезём Вас быстро и с комфортом!</p>
      <hr>
      <p>С помощью нашего онлайн-сервиса Вы можете найти ближайшие такси и заказать понравившийся Вам автомобиль.</p>
      <p>Зарегестрированные пользователи при заказе такси через онлайн-сервис дополнительно получают 5% скидки!</p>
      <a class="btn btn-primary btn-lg" href="./registration.php">
        Регистрация <span class="glyphicon glyphicon-play"></span>
      </a>
    </div>
  </div>
  
</section>
        
<?php
include_once 'html_footer.php';