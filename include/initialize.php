<?php
//define the core paths
//Define them as absolute paths to make sure that require_once works as expected

//DIRECTORY_SEPARATOR is a PHP Pre-defined constants:
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined('SITE_ROOT') ? null : define ('SITE_ROOT', $_SERVER['DOCUMENT_ROOT'].DS.'webmap');

defined('LIB_PATH') ? null : define ('LIB_PATH',SITE_ROOT.DS.'include');

//load the database configuration first.
require_once(LIB_PATH.DS."database.php");
require_once(LIB_PATH.DS."config.php");
require_once(LIB_PATH.DS."PHPMailer-master/src/Exception.php");
require_once(LIB_PATH.DS."PHPMailer-master/src/PHPMailer.php");
require_once(LIB_PATH.DS."PHPMailer-master/src/SMTP.php");
require_once(LIB_PATH.DS."auth_session.php");
require_once(LIB_PATH.DS."configuration.php");
?>