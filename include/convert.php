<?php
    // include_once 'include/config2.php';
    include_once 'initialize.php';

     $sql = "UPDATE grave_data SET status = ? WHERE status = 'occupied1' OR status = 'occupied2' OR status = 'occupied3'";
    //$sql = "UPDATE grave_data SET status = ? WHERE status = ";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("s", $param_status);
        $param_status = "vacant";

        if ($stmt->execute()){
            echo 'Update Complete';
        } else {
            echo 'There was an error, Please try again later';
        }
        $stmt->close();
    } else {
        echo 'Error, Please try again';
    }
    $mysqli->close();
?>