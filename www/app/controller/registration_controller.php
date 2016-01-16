<?php

$objDB = new DataBase;
$objLang = new Lang;
$objAccess = new Access($objDB);
$objValid = new Valid($objDB,$objLang->text);

if (filter_input(INPUT_POST, 'action') === 'reg'){
  if ($objValid->validate()){
    $objDB->addUser($objValid->request);
  }
} else {
  $objValid->clear();
}

$accessType = $objAccess->accessType;
$page = $objAccess->page;
$text = $objLang->text;
$errors = $objValid->errorText();
$fields = $objValid->request;
include_once 'header_view.php';
include_once 'registration_view.php';
include_once 'footer_view.php';