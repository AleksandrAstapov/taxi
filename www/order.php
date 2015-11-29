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

  <!-- ФОРМА -->
  <div class="col-xs-12 col-md-12">
    <form role="form">
      <div class="form-group col-xs-12 col-md-6">
        <label for="from"><?=$text['From']?></label>
        <div class="input-group">
          <input type="text" class="form-control" id="from">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button"><?=$text['On a map']?></button>
          </span>
        </div>
      </div>
      <div class="form-group col-xs-12 col-md-6">
        <label for="to"><?=$text['To']?></label>
        <div class="input-group">
          <input type="text" class="form-control" id="to">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button"><?=$text['On a map']?></button>
          </span>
        </div>
      </div>
    </form>
  </div>

  <!-- КАРТА -->
  <div class="col-xs-12 col-md-12">
    <div id="googleMap" style="width:100%; height:600px;"></div>
  </div>

</section>
        
<?php
include_once 'html_footer.php';