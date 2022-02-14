<?php
defined('server') ? null : define("server", "localhost");
defined('user') ? null : define ("user", "root") ;
defined('pass') ? null : define("pass","");
defined('database_name') ? null : define("database_name", "gravekeeper") ;

$this_file = str_replace('\\', '/', __File__) ;
$doc_root = $_SERVER['DOCUMENT_ROOT'];

$web_root =  str_replace (array($doc_root, "include/database.php") , '' , $this_file);
$server_root = str_replace ('database/database.php' ,'', $this_file);

define ('web_root' , $web_root);
define('server_root' , $server_root);
?>