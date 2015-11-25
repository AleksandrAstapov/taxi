<?php
include_once 'textSheet.inc';
$lang = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'RU';
switch ($lang){
  case 'RU':
    $text = $textRU;
    break;
  case 'EN':
    $text = $textEN;
    break;
}
?>

      <footer>
        <nav class="navbar navbar-default navbar-fixed-bottom">
          <div id="navbar-footer" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="#"><?=$text['Rules']?></a></li>
              <li><a href="#"><?=$text['Tariff']?></a></li>
              <li><a href="#"><?=$text['Licence']?></a></li>
            </ul>
          </div>
        </nav>
      </footer>
      
    </div><!-- end of container-fluid -->
  </body>
</html>

