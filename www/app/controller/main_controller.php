<?php

if (filter_input(INPUT_GET, 'action') === 'confirm') {
  $objDB->confirmUser();
  $objAccess->enter('get');
}

$accessType = $objAccess->accessType;
$page = $objAccess->page;
$text = $objLang->text;
include_once 'header_view.php';
include_once 'main_view.php';
include_once 'footer_view.php';