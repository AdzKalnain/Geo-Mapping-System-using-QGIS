
<?php
require_once("../include/initialize.php");
require_once("../include/config.php");
// if(!isset($_SESSION['USERID'])){
// 	redirect(web_root."admin/index.php");
// }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

	$header=$view;
	$title="Person"; 
	switch ($view) {

	case 'list' :
	 
		$content    = 'map.php';		
		break;

  	default :
	$title="Person";
		$content    = 'map.php';
	}

require_once ("../template/template.php");
?>