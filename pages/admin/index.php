<?php 
require_once("../../include/initialize.php");
require_once("../../include/config.php");

	// if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
    //     header("location: ../../login.php");
    //     exit;
    // }
	// if ($_SESSION["user_type"] == "user") {
	// 	header("location: ../../login.php");
    //     exit;
	// }
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
        header("location: ../../login/index.php");
        exit;
    }
	if ($_SESSION["user_type"] == "user") {
		header("location: ../../login/index.php");
        exit;
	}

if (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "admin") { 
    $content='record.php';
    $view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
    switch ($view) {
        case 'dashboard' :
            $title="Dashboard - Gravekeeper";	
            $content='dashboard.php';	
            $dashboard='active';	
            break;
        case 'profile' :
            $title="Profile - Gravekeeper";	
            $content='profile.php';
            $profile='active';		
            break;
        case 'record' :
            $title="Record - Gravekeeper";	
            $content='record.php';
            $record='active';		
            break;
        case 'employee' :
            $title="Employee - Gravekeeper";	
            $content='employee.php';
            $employee='active';		
            break;
        case 'shop' :
            $title="Shop - Gravekeeper";	
            $content='shop.php';
            $shop='active';		
            break;	
        case 'order' :
            $title="Order - Gravekeeper";	
            $content='order.php';		
            $order='active';
            break;
        case 'map' :
            $title="Map - Gravekeeper";	
            $content='map.php';		
            $map='active';
            break;
        case 'receipt' :
            $title="Receipt - Gravekeeper";	
            $content='receipt.php';
            $order='active';
            break;
        case 'activity' :
            $title="Activity - Gravekeeper";	
            $content='activity.php';
            $activity='active';
            break;

        // FEEDBACK
        case 'feedback' :
            $title="Feedback - Gravekeeper";	
            $content='feedback/feedback.php';		
            $feedback='active';
            break;
        case 'feedback_favorite' :
            $title="Feedback - Gravekeeper";	
            $content='feedback/feedback_favorite.php';		
            $feedback='active';
            break;
        case 'feedback_archive' :
            $title="Feedback - Gravekeeper";	
            $content='feedback/feedback_archive.php';		
            $feedback='active';
            break;
        // FEEDBACK END

        // FUNCTION CONNECTOR
        case 'add' :
            $title="New Record - Gravekeeper";	
            $content='function/add.php';		
            break;
        case 'merge' :
            $title="Merge Record - Gravekeeper";	
            $content='function/merge.php';		
            break;
        case 'payment' :
            $title="Check out - Gravekeeper";	
            $content='payment.php';		
            break;
        // END CONNECTOR

        // TABS
        case 'update_service' :
            $title="Update Service - Gravekeeper";	
            $content='tabs/update_service.php';	
            $shop='active';	
            break;
        case 'add_service' :
            $title="New Service - Gravekeeper";	
            $content='tabs/add_service.php';
            $shop='active';		
            break;
        case 'add_employee' :
            $title="New Employee - Gravekeeper";	
            $content='tabs/add_employee.php';
            $employee='active';		
            break;
    // TABS END

        // OTHER
        case 'insert' :
            $title="New Record - Gravekeeper";	
            $content='tabs/insert_record.php';	
            $record='active';	
            break;
        case 'merge_record' :
            $title="Merge Record - Gravekeeper";	
            $content='tabs/merge_record.php';	
            $record='active';
            break;
        case 'new_record' :
            $title="New Record - Gravekeeper";	
            $content='tabs/new_record.php';	
            $record='active';	
            break;
        case 'add_order' :
            $title="New Order - Gravekeeper";	
            $content='tabs/add_order.php';	
            $order='active';
            break;
        case 'select_order' :
            $title="Select Order - Gravekeeper";	
            $content='tabs/select_order.php';	
            $order='active';	
        break;
        case 'insert_plot' :
            $title="New plot - Gravekeeper";	
            $content='tabs/new_plot.php';	
            $map='active';	
        break;
        case 'add_img' :
            $title="Insert img - Gravekeeper";	
            $content='tabs/add_img.php';	
            $map='active';	
        break;
        case 'service_history':
            $title="Service History - Gravekeeper";
            $content='tabs/service_history.php';
            $record='active';
        break;
        case 'contact_person':
            $title="Contact Person - Gravekeeper";
            $content='tabs/contact_person.php';
            $record='active';
        break;
        case 'order_details':
            $title="Order Details - Gravekeeper";
            $content='tabs/order_details.php';
            $order='active';
        break;
        case 'edit_record':
            $title="Update Record - Gravekeeper";
            $content='tabs/edit_record.php';
            $record='active';
        break;
        case 'account':
            $title="Account - Gravekeeper";
            $content='tabs/account.php';
            $account='active';
        break;
        // 

        default :
            $title="Dashboard - Gravekeeper";	
            $content ='dashboard.php';	
            $dashboard='active';	
    }
    require_once("template/admin_template.php");
}

elseif (isset($_SESSION["user_type"]) && $_SESSION["user_type"] == "clerk") {
    $content='record.php';
    $view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
    switch ($view) {
        case 'dashboard' :
            $title="Dashboard - Gravekeeper";	
            $content='dashboard.php';	
            $dashboard='active';	
            break;
        case 'record' :
            $title="Record - Gravekeeper";	
            $content='record.php';
            $record='active';		
            break;
        case 'order' :
            $title="Order - Gravekeeper";	
            $content='order.php';		
            $order='active';
            break;
        case 'map' :
            $title="Map - Gravekeeper";	
            $content='map.php';		
            $map='active';
            break;
        case 'receipt' :
            $title="Receipt - Gravekeeper";	
            $content='receipt.php';
            $order='active';
            break;

        // FEEDBACK
        case 'feedback' :
            $title="Feedback - Gravekeeper";	
            $content='feedback/feedback.php';		
            $feedback='active';
            break;
        case 'feedback_favorite' :
            $title="Feedback - Gravekeeper";	
            $content='feedback/feedback_favorite.php';		
            $feedback='active';
            break;
        case 'feedback_archive' :
            $title="Feedback - Gravekeeper";	
            $content='feedback/feedback_archive.php';		
            $feedback='active';
            break;
        // FEEDBACK END

        // FUNCTION CONNECTOR
        case 'add' :
            $title="New Record - Gravekeeper";	
            $content='function/add.php';		
            break;
        case 'merge' :
            $title="Merge Record - Gravekeeper";	
            $content='function/merge.php';		
            break;
        case 'payment' :
            $title="Check out - Gravekeeper";	
            $content='payment.php';		
            break;
        // END CONNECTOR

        // TABS
        case 'update_service' :
            $title="Update Service - Gravekeeper";	
            $content='tabs/update_service.php';	
            $shop='active';	
            break;
        case 'add_service' :
            $title="New Service - Gravekeeper";	
            $content='tabs/add_service.php';
            $shop='active';		
            break;
        case 'add_employee' :
            $title="New Employee - Gravekeeper";	
            $content='tabs/add_employee.php';
            $employee='active';		
            break;
    // TABS END

        // OTHER
        case 'insert' :
            $title="New Record - Gravekeeper";	
            $content='tabs/insert_record.php';	
            $record='active';	
            break;
        case 'merge_record' :
            $title="Merge Record - Gravekeeper";	
            $content='tabs/merge_record.php';	
            $record='active';
            break;
        case 'new_record' :
            $title="New Record - Gravekeeper";	
            $content='tabs/new_record.php';	
            $record='active';	
            break;
        case 'add_order' :
            $title="New Order - Gravekeeper";	
            $content='tabs/add_order.php';	
            $order='active';
            break;
        case 'select_order' :
            $title="Select Order - Gravekeeper";	
            $content='tabs/select_order.php';	
            $order='active';	
        break;
        case 'insert_plot' :
            $title="New plot - Gravekeeper";	
            $content='tabs/new_plot.php';	
            $map='active';	
        break;
        case 'add_img' :
            $title="Insert img - Gravekeeper";	
            $content='tabs/add_img.php';	
            $map='active';	
        break;
        case 'service_history':
            $title="Service History - Gravekeeper";
            $content='tabs/service_history.php';
            $record='active';
        break;
        case 'contact_person':
            $title="Contact Person - Gravekeeper";
            $content='tabs/contact_person.php';
            $record='active';
        break;
        case 'order_details':
            $title="Order Details - Gravekeeper";
            $content='tabs/order_details.php';
            $order='active';
        break;
        case 'edit_record':
            $title="Update Record - Gravekeeper";
            $content='tabs/edit_record.php';
            $record='active';
        break;
        // 

        default :
            $title="Dashboard - Gravekeeper";	
            $content ='dashboard.php';	
            $dashboard='active';	
    }
    require_once("template/admin_template.php");
}
?>