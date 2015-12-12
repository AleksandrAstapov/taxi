<?php

include_once './class/Access.class.php';
include_once './class/DataBase.class.php';
include_once './class/Lang.class.php';

$objDB = new DataBase;
$objLang = new Lang;
$objAccess = new Access($objDB);

if (filter_input(INPUT_GET, 'action') === 'confirm') {
  $objDB->confirmUser();
  $objAccess->enter('get');
}

$accessType = $objAccess->accessType;
$page = $objAccess->page;
$text = $objLang->text;
include_once 'html_header.php';

?>

<section class="row">

  <!-- Форма авторизации -->
  <div class="col-sm-4 col-xs-12">
    <?php if ($accessType === 'guest'): ?>
      <form role="form" method="POST">
        <div class="form-group has-feedback">
          <label for="login"><?=$text['Login'];?></label>
          <input id="login" class="form-control" type="text" name="userlogin">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <span class="help-block"></span>
        </div>
        <div class="form-group has-feedback">
          <label for="passw"><?=$text['Password'];?></label>
          <input id="passw" class="form-control" type="password" name="userpassw">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <span class="help-block"></span>
        </div>
        <div class="form-group">
          <button class="btn btn-primary btn-lg" type="submit">
            <?=$text['Enter'];?> <span class="glyphicon glyphicon-play"></span>
          </button>
          <a class="btn btn-link btn-lg pull-right" href="./lostPassword.php">
            <?=$text['LostPassword'];?>?
          </a>
        </div>
      </form>
    <?php elseif ($accessType === 'newuser'): ?>
      <h3>Уважаемый <?=$objAccess->name;?></h3>
      <p>Ваша регистрация не была подтверждена из указанной при регистрации электронной почты, 
      поэтому функционал сайта для Вас временно ограничен. Для подтверждения регистрации 
      войдите в указанную при регистрации почту и перейдите по вложенной в письмо ссылке.</p>
    <?php else: ?>  
      <img src="./img/taxi-ii-2000-18-g.jpg" alt="taxi" class="img-thumbnail">
    <?php endif; ?>
    
  </div>

  <!-- Приветствие -->
  <div class="col-sm-8 col-xs-12">
    <div class="jumbotron">
      <h2 class="text-primary">SI-Taxi приветствует Вас!</h2>
      <p>Благодарим за выбор нашей службы такси.</p>
      <p>Мы довезём Вас быстро и с комфортом!</p>
      <hr>
      <p>С помощью нашего онлайн-сервиса Вы можете найти ближайшие такси и заказать понравившийся Вам автомобиль.</p>
      <p>Зарегестрированные пользователи при заказе такси через онлайн-сервис дополнительно получают 5% скидки!</p>
      <?php if ($accessType == 'guest'): ?>
        <a class="btn btn-primary btn-lg" href="./registration.php">
          <?=$text['Registration'];?> <span class="glyphicon glyphicon-play"></span>
        </a>
      <?php endif; ?>
    </div>
  </div>
  
</section>
        
<?php
include_once 'html_footer.php';