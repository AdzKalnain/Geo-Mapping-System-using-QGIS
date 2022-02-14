<?php
require_once ("../../../include/initialize.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	 

$function = (isset($_GET['function']) && $_GET['function'] != '') ? $_GET['function'] : '';
switch ($function) {
    case 'checkout' :
        checkout();
        break;

	case 'pay' :
        pay();
        break;

    case 'cancel' :
        cancel();
        break;

    case 'complete' :
        complete();
        break;

    case 'email' :
        email();
        break;

    case 'account' :
        account();
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

        if (empty($name_error) && empty($deceasedname_error)) {

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
                    message ("Order was placed successfully","success");
                    header("location: ../index.php?page=order");
                } else {
                    message ("Something went wrong please try again later","error");
                    header("location: ../index.php?page=order");
                }
                $stmt->close();
            }
            
        } else {
            message ("Something went wrong. Please make sure that the field isn't empty","error");
            header("location: ../index.php?page=order");
        }   
    }
    $mysqli->close();
}

function pay() {
    global $mysqli;
    $refnumber = $_GET['refnumber'];
        
        $sql = "UPDATE grave_orders SET payment_status = ?, order_status = ? WHERE order_refnumber = ?";
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("sss", $param_payment ,$param_order, $param_refnumber);
                $param_payment = 'Paid';
                $param_order = 'Active';
                $param_refnumber = $refnumber;
                if ($stmt->execute()) {
                    $activity = "Order number ".$refnumber." has been placed into an active state";
                    $activity_query = "INSERT INTO grave_activity (act_name, act_personnel, act_date) VALUES (?,?,?)";
                    if ($stmt_act = $mysqli->prepare($activity_query)) {
                        $stmt_act->bind_param("sss", $param_activity, $param_personnel, $param_act_date);
                        $param_activity = $activity;
                        $param_personnel = $_SESSION['name'];;
                        $param_act_date = date("Y-m-d H:i:s");
                        if ($stmt_act->execute()) {
                            message ("Order has been put to active state","success");
                            header("location: ../index.php?page=order");
                        } else {
                            message ("Something went wrong please try again later ","error");
                            header("location: ../index.php?page=order");        
                        }
                    } else {
                        message ("Something went wrong please try again later ","error");
                        header("location: ../index.php?page=order");
                    }     
                } else {
                    message ("Something went wrong please try again later","error");
                    header("location: ../index.php?page=order");    
                }
            } else {
                message ("Something went wrong please try again later","error");
                header("location: ../index.php?page=order");
            }
            $stmt->close();
        $mysqli->close();
}

function cancel() {
    global $mysqli;
    $refnumber = $_GET['refnumber'];
        
        $sql = "DELETE FROM grave_orders WHERE order_refnumber = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $param_refnumber);
            $param_refnumber = $refnumber;
            if ($stmt->execute()) {
                $activity = "Order number ".$refnumber." has been cancelled";
                $activity_query = "INSERT INTO grave_activity (act_name, act_personnel, act_date) VALUES (?,?,?)";
                if ($stmt_act = $mysqli->prepare($activity_query)) {
                    $stmt_act->bind_param("sss", $param_activity, $param_personnel, $param_act_date);
                    $param_activity = $activity;
                    $param_personnel = $_SESSION['name'];;
                    $param_act_date = date("Y-m-d H:i:s");
                    if ($stmt_act->execute()) {
                        message ("The order has been removed","success");
                        header("location: ../index.php?page=order");
                    } else {
                        message ("Something went wrong please try again later ","error");
                        header("location: ../index.php?page=order");        
                    }
                } else {
                    message ("Something went wrong please try again later ","error");
                    header("location: ../index.php?page=order");
                }
            } else {
                message ("Something went wrong please try again later ","error");
                header("location: ../index.php?page=order");
            }
        } else {
            message ("Something went wrong please try again later ","error");
            header("location: ../index.php?page=order");
        }
        $stmt->close();
    $mysqli->close();
}

function complete() {
    global $mysqli;
    $refnumber = $_GET['referencenumber'];
        
        $sql = "UPDATE grave_orders SET order_status = ? WHERE order_refnumber = '$refnumber'";
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("s", $param_order);
                $param_order = 'Completed';
                
                if ($stmt->execute()) {
                    $date = date('M-d-Y');
                    $personnel = $_SESSION['name'];
                    $activity = "Order number ".$refnumber." has been marked as completed";
                    $activity_query = "INSERT INTO grave_activity (act_name, act_personnel, act_date) VALUES (?,?,?)";
                    if ($stmt_act = $mysqli->prepare($activity_query)) {
                        $stmt_act->bind_param("sss", $param_activity, $param_personnel, $param_act_date);
                        $param_activity = $activity;
                        $param_personnel = $personnel;
                        $param_act_date = date("Y-m-d H:i:s");
                        if ($stmt_act->execute()) {
                            $fetch = mysqli_query($mysqli, "SELECT * FROM grave_orders WHERE order_refnumber = '$refnumber'");
                            while ($row = mysqli_fetch_array($fetch)) { 
                                if ($row['orderer_email'] != "") {
                                    $mail = new PHPMailer;
                                    $mail->isSMTP();
                                    $mail->SMTPDebug = 0;
                                    $mail->Host = 'smtp.hostinger.com';
                                    $mail->Port = 587;
                                    $mail->SMTPAuth = true;
                                    $mail->Username = 'management@gravekeeper.website';
                                    $mail->Password = 'Gravekeeper12161998';
                                    $mail->setFrom('management@gravekeeper.website', 'Gravekeeper');
                                    $mail->addReplyTo('management@gravekeeper.website', 'Gravekeeper');
                                    $mail->AddAddress($row['orderer_email'], $row['orderer_name']);
                                    $mail->Subject  =  'Notice of Completion';
                                    $mail->IsHTML(true);
                                    $html = file_get_contents('completion.html');
                                    $html = str_replace("[date today]",$date,$html);
                                    $html = str_replace("[receiver name]",$row['orderer_name'],$html);
                                    $html = str_replace("[[service number]]",$row['order_refnumber'],$html);
                                    $html = str_replace("[[service name]]",$row['order_name'],$html);
                                    $html = str_replace("[[order date]]",$row['order_date'],$html);
                                    $html = str_replace("[[order cost]]",$row['order_total'],$html);
                                    $mail->Body = $html;
                                    if($mail->Send()) {
                                        message ("Order has been marked as completed","success");
                                        header('location: ../index.php?page=order');
                                    } else {
                                        echo "Mail Error - >".$mail->ErrorInfo;
                                    }
                                } else {
                                    message ("Order has been marked as completed","success");
                                    header("location: ../index.php?page=order");
                                }
                            }
                        } else {
                            message ("Something went wrong please try again later ","error");
                            header("location: ../index.php?page=order");
                        }
                    } else {
                        message ("Something went wrong please try again later ","error");
                        header("location: ../index.php?page=order");
                    }

                    // $fetch = mysqli_query($mysqli, "SELECT * FROM grave_orders WHERE order_refnumber = '$refnumber'");
                    // while ($row = mysqli_fetch_array($fetch)) { 
                    //     if ($row['orderer_email'] != "") {
                    //         $mail = new PHPMailer;
                    //         $mail->isSMTP();
                    //         $mail->SMTPDebug = 0;
                    //         $mail->Host = 'smtp.hostinger.com';
                    //         $mail->Port = 587;
                    //         $mail->SMTPAuth = true;
                    //         $mail->Username = 'management@gravekeeper.website';
                    //         $mail->Password = 'Gravekeeper12161998';
                    //         $mail->setFrom('management@gravekeeper.website', 'Gravekeeper');
                    //         $mail->addReplyTo('management@gravekeeper.website', 'Gravekeeper');
                    //         $mail->AddAddress($row['orderer_email'], $row['orderer_name']);
                    //         $mail->Subject  =  'Notice of Completion';
                    //         $mail->IsHTML(true);
                    //         $html = file_get_contents('completion.html');
                    //         $html = str_replace("[date today]",$date,$html);
                    //         $html = str_replace("[receiver name]",$row['orderer_name'],$html);
                    //         $html = str_replace("[[service number]]",$row['order_refnumber'],$html);
                    //         $html = str_replace("[[service name]]",$row['order_name'],$html);
                    //         $html = str_replace("[[order date]]",$row['order_date'],$html);
                    //         $html = str_replace("[[order cost]]",$row['order_total'],$html);
                    //         $mail->Body = $html;
                    //         if($mail->Send()) {
                    //             message ("Order has been marked as completed","success");
                    //             header('location: ../index.php?page=order');
                    //         } else {
                    //             echo "Mail Error - >".$mail->ErrorInfo;
                    //         }
                    //     } else {
                    //         message ("Order has been marked as completed","success");
                    //         header("location: ../index.php?page=order");
                    //     }
                    // }     
                } else {
                    message ("Something went wrong please try again later","error");
                    header("location: ../index.php?page=order");    
                }
            } else {
                message ("Something went wrong please try again later","error");
                header("location: ../index.php?page=order");
            }
        $stmt->close();
        $mysqli->close();
}

function email() {
    global $mysqli;
    $email = $_GET['email'];
    $name = $_GET['name'];
    $refnumber = $_GET['refnumber'];

    $query = "SELECT * FROM grave_orders WHERE orderer_email = '$email'";
    $result = mysqli_query($mysqli, $query);
    
    if ($result) {
        $date = date('M-d-Y');

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'management@gravekeeper.website';
        $mail->Password = 'Gravekeeper12161998';
        $mail->setFrom('management@gravekeeper.website', 'Gravekeeper');
        $mail->addReplyTo('management@gravekeeper.website', 'Gravekeeper');
        $mail->AddAddress($email, $name);
        $mail->Subject  =  'Service Request';
        $mail->IsHTML(true);
        $fetch = mysqli_query($mysqli, "SELECT * FROM grave_orders WHERE order_refnumber = '$refnumber'");
        while ($row = mysqli_fetch_array($fetch)) { 
            $html = file_get_contents('receipt.html');
            $html = str_replace("[date today]",$date,$html);
            $html = str_replace("[receiver name]",$name,$html);
            $html = str_replace("[[service number]]",$row['order_refnumber'],$html);
            $html = str_replace("[[service name]]",$row['order_name'],$html);
            $html = str_replace("[[order date]]",$row['order_date'],$html);
            $html = str_replace("[[order cost]]",$row['order_total'],$html);
            $mail->Body = $html;
        }
        if($mail->Send()) {
            message ("Receipt was sent to email successfully","success");
            header('location: ../index.php?page=order');
        } else {
            echo "Mail Error - >".$mail->ErrorInfo;
        }
    } else {
        echo "ERROR: Could not be able to execute $query.".mysqli_error($mysqli);
    }
}

function account() {
    global $mysqli;
    $emp_fname = $emp_lname = $emp_email = $emp_status = $emp_pass = "";
    $fname_error = $lname_error =  $email_error = $pass_error = "";
    
    if(isset($_POST['btn-submit'])){
    
        // Firstname
        if (empty($_POST['acc-fname'])) {
            $fname_error = "true";
        }else {
            $emp_fname = $_POST['acc-fname'];
        }

        // Lastname
        if (empty($_POST['acc-lname'])) {
            $lname_error = "true";
        }else {
            $emp_lname = $_POST['acc-lname'];
        }

        // Email
        if (empty($_POST['acc-email'])) {
            $email_error = "true";
        } else {
            $emp_email = $_POST['acc-email'];
        }

        // Password
        if (empty($_POST['acc-pass'])) {
            $pass_error = "true";
        } else {
            $emp_pass = $_POST['acc-pass'];
        }

        $emp_status = $_POST['acc-role'];
        
        if (empty($fname_error) && empty($lname_error) && empty($email_error)) {
            $sql = "INSERT INTO grave_user (user_type, user_name, user_email, user_password, user_status, creation_date) VALUE (?,?,?,?,?,?)";
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("ssssss", $param_role ,$param_name, $param_email, $param_password, $param_status, $param_date);
                $param_role = $emp_status;
                $param_name = $emp_fname." ".$emp_lname;
                $param_email = $emp_email;
                $param_password = password_hash($emp_pass, PASSWORD_DEFAULT);;
                $param_status = "verified";
                $param_date = date("Y-m-d H:i:s");
                if ($stmt->execute()) {
                    message ("Account has been registered successfuly","success");
                    header("location: ../index.php?page=account");     
                } else {
                    message ("Something went wrong please try again later","error");
                    header("location: ../index.php?page=account");    
                }
                $stmt->close();
            } else {
                message ("Something went wrong please try again later","error");
                header("location: ../index.php?page=account");
            }
        } else {
            message("Please make sure that your inputting the correct type of characters and fields must not be empty","error");
            header("location: ../index.php?page=account");
        }
    }
        $mysqli->close();
}

?>