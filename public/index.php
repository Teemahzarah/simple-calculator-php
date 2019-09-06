<?php

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);

try {
  $dirroot = dirname(dirname(__FILE__));
  require_once $dirroot
    . DIRECTORY_SEPARATOR . 'vendor'
    . DIRECTORY_SEPARATOR . 'autoload.php';
  (new app\core\request\Route())->render($dirroot, $_REQUEST);
} catch (Exception $ex) {
  echo '<pre>'
    . 'Fatal Error!'
    . PHP_EOL . $ex->getMessage()
    . PHP_EOL . $ex->getTraceAsString()
    . '</pre>';
}
