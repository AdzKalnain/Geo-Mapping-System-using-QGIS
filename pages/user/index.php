<?php 
require_once("../../include/initialize.php");
require_once("../../include/config.php");

	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
        header("location: ../../login/index.php");
        exit;
    }
	elseif ($_SESSION["user_type"] == "admin") {
		header("location: ../../login/index.php");
        exit;
	} elseif ($_SESSION["user_type"] == "clerk") {
		header("location: ../../login/index.php");
        exit;
	}

$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	case 'home' :
        $title="User Panel";	
		$content='home.php';
        $home='active';			
		break;
    case 'service' :
        $title="User Panel";	
        $content='service.php';		
        $service='active';	
        break;	
    case 'request' :
        $title="User Panel";	
        $content='tabs/request_form.php';		
        $service='active';	
        break;	
    case 'map' :
        $title="User Panel";	
        $content='map.php';		
        $map='active';	
        break;	
    case 'order_detail' :
        $title="User Panel";	
        $content='tabs/order_detail.php';		
        $home='active';	
        break;	
	default :
	    $title="User Panel";	
		$content ='home.php';
        $home='active';		
}
require_once("template/user_template.php");
?>