<?php
?>

<html>
  <head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./img/Icon.png"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/taxi_main.css">
    <script src="./js/jquery-1.11.2.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="./js/mapScript.js"></script>
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title>Заказ такси</title>
  </head>

  <body>
    <div class="container-fluid">

      <!-- Строка "Меню" -->
      <header class="row">
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-header">
                <span class="icon-bar"></span>
                <span class="glyphicon glyphicon-chevron-down"></span>
              </button>
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-footer">
                <span class="glyphicon glyphicon-chevron-up"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="./">
                <img class="navbar-img" src="./img/Taxi-Left-Yellow-icon.png" alt="taxi.loc">
              </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div id="navbar-header" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="order.html">Главная</a></li>
                <li><a href="order.html">Заказ такси</a></li>
                <li><a href="#">Водителю</a></li>
                <li><a href="admin.html">Администратору</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Регистрация</a></li>
                <li class="hidden"><a href="#">Выход</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>

      <!-- Строка центральная -->
      <section class="row">

        <!-- Форма авторизации -->
        <div class="col-sm-4 col-xs-12">
          <form role="form">
            <div class="form-group has-feedback">
              <label for="login">Логин</label>
              <input id="login" class="form-control" type="text" name="login">
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
              <span class="help-block"></span>
            </div>
            <div class="form-group has-feedback">
              <label for="passw">Пароль</label>
              <input id="passw" class="form-control" type="password" name="passw">
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
            
            <!--center-block-->
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
        

      <!-- Строка "Футер" -->
      <footer>
        <nav class="navbar navbar-default navbar-fixed-bottom">
          <div id="navbar-footer" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="#">Правила</a></li>
              <li><a href="#">Тарифы</a></li>
              <li><a href="#">Лицензия</a></li>
            </ul>
          </div>
        </nav>
      </footer>
      
    </div>
  </body>
</html>