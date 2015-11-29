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

  <!-- Левый столбец -->
  <div class="col-xs-2 col-md-2">
    <div class="btn-group-vertical">
      <a class="btn btn-default  active" href="#">Карта</a>
      <a class="btn btn-default" href="#">Машины</a>
      <a class="btn btn-default" href="#">Водители</a>
      <a class="btn btn-default" href="#">Пользователи</a>
      <a class="btn btn-default" href="#">Текущие заказы</a>
      <a class="btn btn-default" href="#">История заказов</a>
    </div>
  </div>

  <!-- Правый столбец -->
  <div class="col-xs-10 col-md-10">
    
    <!-- КАРТА -->
    <div id="googleMap" style="width:100%; height:500px;"></div>
    <br>
    <ul class="nav nav-tabs">
      <li class="active"><a href="#new" data-toggle="tab">Новые заказы</a></li>
      <li><a href="#current" data-toggle="tab">Выполняемые заказы</a></li>
      <li><a href="#complate" data-toggle="tab">Завершенные заказы</a></li>
    </ul>
    
    <!-- ВКЛАДКИ -->
    <div class="tab-content">
      <div class="tab-pane fade in active" id="new">
        <table class="table table-hover">
          <tr>
            <th>#</th>
            <th>Клиент</th>
            <th>Машина</th>
            <th>Стоимость</th>
            <th>Время приема</th>
          </tr>
          <tr>
            <td>#</td>
            <td>Клиент</td>
            <td>Машина</td>
            <td>Стоимость</td>
            <td>Время приема</td>
            <td>
              <button type="button" class="btn btn-primary btn-sm">Подтвердить</button>
              <button type="button" class="btn btn-default btn-sm">Отклонить</button>
            </td>
          </tr>
          <tr>
            <td>#</td>
            <td>Клиент</td>
            <td>Машина</td>
            <td>Стоимость</td>
            <td>Время приема</td>
            <td>
              <button type="button" class="btn btn-primary btn-sm">Подтвердить</button>
              <button type="button" class="btn btn-default btn-sm">Отклонить</button>
            </td>
          </tr>
        </table>
      </div>
      <div class="tab-pane fade" id="current">
        <table class="table table-hover">
          <tr>
            <th>#</th>
            <th>Клиент</th>
            <th>Машина</th>
            <th>Стоимость</th>
            <th>Время приема</th>
          </tr>
          <tr>
            <td>#</td>
            <td>Клиент</td>
            <td>Машина</td>
            <td>Стоимость</td>
            <td>Время приема</td>
          </tr>
          <tr>
            <td>#</td>
            <td>Клиент</td>
            <td>Машина</td>
            <td>Стоимость</td>
            <td>Время приема</td>
          </tr>
        </table>
      </div>
      <div class="tab-pane fade" id="complate">
        <table class="table table-hover">
          <tr>
            <th>#</th>
            <th>Клиент</th>
            <th>Машина</th>
            <th>Стоимость</th>
            <th>Время приема</th>
            <th>Время завершения</th>
          </tr>
          <tr>
            <td>#</td>
            <td>Клиент</td>
            <td>Машина</td>
            <td>Стоимость</td>
            <td>Время приема</td>
            <td>Время завершения</td>
          </tr>
          <tr>
            <td>#</td>
            <td>Клиент</td>
            <td>Машина</td>
            <td>Стоимость</td>
            <td>Время приема</td>
            <td>Время завершения</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  
</section>
        
<?php
include_once 'html_footer.php';