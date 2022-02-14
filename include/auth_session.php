<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            header("Location: ../../login/index.php");
            exit();
        
    }

    function message($msg="", $msgtype="") {
        global $message;
        if(!empty($msg)) {
          $_SESSION['message'] = $msg;
          $_SESSION['msgtype'] = $msgtype;
        } else {
            return $message;
        }
    }
    function check_message(){
        if(isset($_SESSION['message'])){
            if(isset($_SESSION['msgtype'])){
            if ($_SESSION['msgtype']=="info"){
                echo  '<label class="alert alert-info alert-dismissible" style="width:100%;padding:10px;font-size:11px">'. $_SESSION['message'] . '<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding:5px"><span aria-hidden="true">&times;</span></button></label>';
                
            }elseif($_SESSION['msgtype']=="error"){
                echo  '<label class="alert alert-danger alert-dismissible" style="width:100%;padding:10px;font-size:11px">' . $_SESSION['message'] . '<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding:5px"><span aria-hidden="true">&times;</span></button></label>';
                        
            }elseif($_SESSION['msgtype']=="success"){
                echo  '<label class="alert alert-success alert-dismissible" style="width:100%;padding:10px;font-size:11px">' . $_SESSION['message'] . '<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding:5px"><span aria-hidden="true">&times;</span></button></label>';
            } 
            unset($_SESSION['message']);
            unset($_SESSION['msgtype']);
            }
        
        }
    }
?>