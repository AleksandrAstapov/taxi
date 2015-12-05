<?php

global $accessType, $page, $text;
$pageWithMap = array('admin.php','order.php');

?>

<html>
  <head>
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="./img/Icon.png"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/taxi_main.css">
    <script src="./js/jquery-1.11.2.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <?php if (in_array($page, $pageWithMap)): ?>
      <script src="http://maps.googleapis.com/maps/api/js"></script>
      <script src="./js/mapScript.js"></script>
    <?php endif ?>
    <title><?=$text[$page]?></title>
  </head>

  <body>
    <div class="container-fluid">
      <!-- HEADER -->
      <header class="row">
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container-fluid">
            <!-- VISIBLE -->
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
            <!-- COLLAPSED -->
            <div id="navbar-header" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php"><?=$text['index.php']?></a></li>
                <li><a href="order.php"><?=$text['order.php']?></a></li>
                <?php if ($accessType == 'driver'): ?>
                  <li><a href="driver.php"><?=$text['driver.php']?></a></li>
                <?php elseif ($accessType == 'admin'): ?>
                  <li><a href="admin.php"><?=$text['admin.php']?></a></li>
                <?php endif ?>
              </ul>
              <form class="navbar-form navbar-right" action="index.php" method="POST">
                <select id="lang" class="form-control">
                  <?php foreach($objLang->langList as $val): ?>
                    <option <?= ($val == $objLang->lang) ? 'selected' : '' ?>><?=$val?></option>
                  <?php endforeach ?>
                </select>
                <?php if ($accessType !== 'guest'): ?>
                  <button class="btn btn-default" type="submit" name="action" value="quilt">
                    <?=$text['Exit']?>
                  </button>
                <?php endif ?>
              </form>
            </div>
          </div>
        </nav>
      </header>
      <SCRIPT>
        $('#navbar-header a[href$="<?=$page;?>"]').parent('li').addClass('active');
        $('#lang').on('change', function(){
          document.cookie = 'lang='+this.value;
          window.location.reload();
        });
      </SCRIPT>