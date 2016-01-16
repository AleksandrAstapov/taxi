<?php

set_include_path(get_include_path().';app\model\\;app\view\\');
spl_autoload_extensions('_model.php');
spl_autoload_register();

$objDB = new DataBase;
$objLang = new Lang;
$objAccess = new Access($objDB);

$page = basename($_SERVER['REQUEST_URI']);
if (is_file("app/controller/{$page}_controller.php")) {
  include_once "app/controller/{$page}_controller.php";
} else {
  include_once "app/controller/main_controller.php";
}