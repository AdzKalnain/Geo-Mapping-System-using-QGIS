<?php
session_start();
require_once ("../../include/config.php");

$function = (isset($_GET['function']) && $_GET['function'] != '') ? $_GET['function'] : '';
switch ($function) {
    case 'checkout' :
        checkout();
        break;
    }

    function checkout(){
        global $mysqli;
        $name_error = $email_error = $contact_error = $grave_error = $deceasedname_error = $instruction_error = "";
        $name = $email = $contact = $graveno = $deceasedname = $instruction = "";
    
        $ordercost = $_GET['ordercost'];
        $ordername = $_GET['ordername'];
        $ordercode = $_POST['orderNumber'];
        $date = date("Y-m-d H:i:s");
    
        if (isset($_POST['checkout'])) {
            
            if (empty($_POST['ordererName'])) {
                $name_error = "true";
            } else {
                $name = $_POST['ordererName'];
            }
    
            if (empty($_POST['ordererEmail'])) {
                $email_error = "true";
            } else {
                $email = $_POST['ordererEmail'];
            }
    
            if (empty($_POST['ordererContact'])) {
                $contact_error = "true";
            } else {
                $contact = $_POST['ordererContact'];
            }
    
            if (empty($_POST['graveNo'])) {
                $grave_error = "true";
            } else {
                $graveno = $_POST['graveNo'];
            }

            if (empty($_POST['deceasedName'])) {
                $deceasedname_error = "true";
            } else {
                $deceasedname = $_POST['deceasedName'];
            }

            if (empty($_POST['instruction'])) {
                $instruction_error = "true";
            } else {
                $instruction = $_POST['instruction'];
            }
    
            if (empty($name_error) && empty($email_error) && empty($contact_error) && empty($grave_error) && empty($deceasedname_error) && empty($instruction_error)) {
    
                $sql = "INSERT INTO grave_orders (orderer_name, orderer_email, orderer_contact, order_name, selected_grave, deceased_name, order_total, payment_method, payment_status, order_refnumber, instruction, order_status, order_date) VALUE (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->bind_param("sssssssssssss", $param_name, $param_email, $param_contact, $param_service, $param_grave, $param_deceasedname, $param_total, $param_method, $param_paymentstatus, $param_code, $param_instruction, $param_status, $param_date);
                    $param_name = $name;
                    $param_email = $email;
                    $param_contact = $contact;
                    $param_service = $ordername;
                    $param_grave = $graveno;
                    $param_deceasedname = $deceasedname;
                    $param_total = $ordercost;
                    $param_method = "In-Person";
                    $param_paymentstatus = "Un-paid";
                    $param_code = $ordercode;
                    $param_instruction = $instruction;
                    $param_status = "Pending";
                    $param_date = $date;
    
                    if ($stmt->execute()) {
                        $_SESSION['status'] = '<label class="alert alert-success alert-dismissible" style="width:100%;padding:10px;font-size:11px;margi-top:10px">Your request has been submitted<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding:5px"><span aria-hidden="true">&times;</span></button></label>';
                        header("location: ../../service.php");
                    } else {
                        $_SESSION['status'] = '<label class="alert alert-danger alert-dismissible" style="width:100%;padding:10px;font-size:11px">Something went wrong please try again later<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding:5px"><span aria-hidden="true">&times;</span></button></label>';
                        header("location: ../../service.php");
                    }
                    $stmt->close();
                }
                
            } else {
                // message ("Something went wrong. Please make sure that the field isn't empty","error");
                $_SESSION['status'] = '<label class="alert alert-danger alert-dismissible" style="width:100%;padding:10px;font-size:11px">Something went wrong please try again later<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding:5px"><span aria-hidden="true">&times;</span></button></label>';
                header("location: ../../service.php");
            }   
        }
        $mysqli->close();
    }

?>