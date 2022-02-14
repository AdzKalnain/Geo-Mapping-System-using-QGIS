<?php
require_once ("../../../include/initialize.php");


$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
	case 'favorite' :
        favorite();
        break;

    case 'unfavorite' :
        unfavorite();
        break;

    case 'archive' :
        archive();
        break;

    case 'delete' :
        delete();
        break;

}

function favorite(){
    global $mysqli;
    $feedback_id = $_GET['feedbackid'];
        
        $sql = "UPDATE grave_feedback SET feedback_status = ? WHERE feedback_id = ?";
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("ss", $param_status ,$param_id);
                $param_status = 'Favorite';
                $param_id = $feedback_id;
                
                if ($stmt->execute()) {
                    message ("Feedback has been marked as favorite","success");
                    header("location: ../index.php?page=feedback_favorite");     
                } else {
                    message ("Something went wrong please try again later","error");
                    header("location: ../index.php?page=feedback_favorite");    
                }
            } else {
                message ("Something went wrong please try again later","error");
                header("location: ../index.php?page=feedback_favorite");
            }
            $stmt->close();
        $mysqli->close();
}

function unfavorite(){
    global $mysqli;
    $feedback_id = $_GET['feedbackid'];
        
        $sql = "UPDATE grave_feedback SET feedback_status = ? WHERE feedback_id = ?";
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("ss", $param_status ,$param_id);
                $param_status = 'Archive';
                $param_id = $feedback_id;
                
                if ($stmt->execute()) {
                    message ("Feedback has been remove as favorite","success");
                    header("location: ../index.php?page=feedback_favorite");
                } else {
                    message ("Something went wrong please try again later","error");
                    header("location: ../index.php?page=feedback");    
                }
            } else {
                message ("Something went wrong please try again later","error");
                header("location: ../index.php?page=feedback");
            }
            $stmt->close();
        $mysqli->close();
}

function archive(){
    global $mysqli;
    $feedback_id = $_GET['feedbackid'];
        
        $sql = "UPDATE grave_feedback SET feedback_status = ? WHERE feedback_id = ?";
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("ss", $param_status ,$param_id);
                $param_status = 'Archive';
                $param_id = $feedback_id;
                
                if ($stmt->execute()) {
                    message ("Feedback has been marked as favorite","success");
                    header("location: ../index.php?page=feedback");     
                } else {
                    message ("Something went wrong please try again later","error");
                    header("location: ../index.php?page=feedback");    
                }
            } else {
                message ("Something went wrong please try again later","error");
                header("location: ../index.php?page=feedback");
            }
            $stmt->close();
        $mysqli->close();
}

function delete(){
    global $mysqli;
    $landing = $_GET['landing'];
    $feedback_id = $_GET['feedbackid'];
        $sql = "DELETE FROM grave_feedback WHERE feedback_id = ?";
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("s", $param_id);
                $param_id = $feedback_id;
                if ($stmt->execute()) {
                    header("location: ../index.php?page=feedback_archive");     
                } else {
                    message ("Something went wrong please try again later","error");
                    header("location: ../index.php?page=feedback_archive");    
                }
            } else {
                message ("Something went wrong please try again later","error");
                header("location: ../index.php?page=feedback_archive");
            }
            $stmt->close();
        $mysqli->close();
}

?>