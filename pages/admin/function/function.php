<?php
require_once ("../../../include/initialize.php");
	 

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
switch ($action) {
	case 'accept' :
	accept();
	break;

    case 'deny' :
    deny();
    break;

    case 'add' :
    add();
    break;

    case 'update' :
    update();
    break;

    case 'plot' :
    plot();
    break;

    case 'img' :
    img();
    break;

}
   
function accept(){
    global $mysqli;
    $grave_no = $_GET['graveid'];
        $sql = "UPDATE grave_data SET status = ? WHERE grave_no = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("ss", $param_status, $param_graveno);
            $param_status = 'occupied';
            $param_graveno = $grave_no;
            if ($stmt->execute()) {
                $path = '../../../upload/';
                $fetch = mysqli_query($mysqli, "SELECT * FROM grave_file WHERE data_id = $grave_no");
                if ($row = mysqli_fetch_array($fetch)) {
                    if(unlink($path.$row['user_file']) && unlink($path.$row['deceased_file'])) {
                        $sqldelete = "DELETE FROM grave_file WHERE data_id = $grave_no";
                        if (mysqli_query($mysqli, $sqldelete)) {
                            header("location: ../index.php?page=request");
                        } else {
                            message ("Something went wrong please try again later","error");
                            header("location: ../index.php?page=request");    
                        }
                    } else {
                        message ("Something went wrong please try again later","error");
                        header("location: ../index.php?page=request");
                    }
                } else {
                    message ("Something went wrong please try again later","error");
                    header("location: ../index.php?page=request");
                }
            } else {
                message ("Something went wrong please try again later","error");
                header("location: ../index.php?page=request");    
            }
        } else {
            message ("Something went wrong please try again later","error");
            header("location: ../index.php?page=request");
        }
        $stmt->close();
    $mysqli->close();
}

function deny(){
    global $mysqli;
    $grave_no = $_GET['graveid'];
        $sql = "UPDATE grave_data SET status = ? WHERE grave_no = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("si", $param_status, $param_graveno);
            $param_status = 'vacant';
            $param_graveno = $grave_no;
            if ($stmt->execute()) {
                $path = '../../../upload/';
                $fetch = mysqli_query($mysqli, "SELECT * FROM grave_file WHERE data_id = $grave_no");
                if ($row = mysqli_fetch_array($fetch)) {
                    if(unlink($path.$row['user_file']) && unlink($path.$row['deceased_file'])) {
                        $sqldelete = "DELETE FROM grave_file WHERE data_id = $grave_no";
                        if (mysqli_query($mysqli, $sqldelete)) {
                            $del_record = "DELETE FROM grave_record WHERE grave_id = $grave_no";
                            if (mysqli_query($mysqli, $del_record)) {
                                header("location: ../index.php?page=request");
                            }
                        } else {
                            message ("Something went wrong please try again later","error");
                            header("location: ../index.php?page=request");    
                        }
                    } else {
                        message ("Something went wrong please try again later","error");
                        header("location: ../index.php?page=request");
                    }
                } else {
                    message ("Something went wrong please try again later","error");
                    header("location: ../index.php?page=request");
                }
                
            } else {
                message ("Something went wrong please try again later","error");
                header("location: ../index.php?page=request");    
            }
        } else {
            message ("Something went wrong please try again later","error");
            header("location: ../index.php?page=request");
        }
        $stmt->close();
    $mysqli->close();
}

function add(){
    global $mysqli;
    $deceased_fname = $deceased_mname = $deceased_gender = $deceased_agegroup = $deceased_contactname = $deceased_contactno = $deceased_contactemail = $deceased_lname = $deceased_birthdate = $deceased_deathdate = $deceased_graveno = $userfile = $deceasedfile = $ext = $ext2 = "";
    $user_id = $_SESSION['id'];
    $deceased_fname_error = $deceased_mname_error = $deceased_lname_error = $deceased_gender_error = $deceased_agegroup_error = $deceased_contactname_error = $deceased_contactno_error = $deceased_contactemail_error = $deceased_birthdate_error = $deceased_deathdate_error = $deceased_graveno_error = $userfile_error = $deceasedfile_error = "";
    
    if(isset($_POST['btn-submit'])){
    
        if (empty($_POST["deceased-firstname"])) {
            $deceased_fname_error = "true";
        }elseif (!preg_match('/^[a-zA-Z]+$/', $_POST["deceased-firstname"])) {
            $deceased_fname_error = "Firstname can only contain letters";
        }else {
            $deceased_fname = $_POST["deceased-firstname"];
        }

        if (empty($_POST["deceased-middlename"])) {
            $deceased_mname_error = "true";
        }elseif (!preg_match('/^[a-zA-Z]+$/', $_POST["deceased-middlename"])) {
            $deceased_mname_error = "Middlename can only contain letters";
        }else {
            $deceased_mname = $_POST["deceased-middlename"];
        } 

        if (empty($_POST["deceased-lastname"])) {
            $deceased_lname_error = "true";
        }elseif (!preg_match('/^[a-zA-Z]+$/', $_POST["deceased-lastname"])) {
            $deceased_lname_error = "true";
        } else {
            $deceased_lname = $_POST["deceased-lastname"];
        }

        if (empty($_POST["deceased-birthday"])) {
            $deceased_birthdate_error = "true";
        }else {
            $deceased_birthdate = $_POST["deceased-birthday"];
        }

        if (empty($_POST["deceased-deathday"])) {
            $deceased_deathdate_error = "true";
        }else {
            $deceased_deathdate = $_POST["deceased-deathday"];
        }

        if (empty($_POST["deceased-gender"])) {
            $deceased_gender_error = "true";
        }else {
            $deceased_gender = $_POST["deceased-gender"];
        }

        if (empty($_POST["deceased-agegroup"])) {
            $deceased_agegroup_error = "true";
        }else {
            $deceased_agegroup = $_POST["deceased-agegroup"];
        }

        if (empty($_POST["deceased-contactname"])) {
            $deceased_contactname_error = "true";
        }else {
            $deceased_contactname = $_POST["deceased-contactname"];
        }
        
        if (empty($_POST["grave-no"])) {
            $deceased_graveno_error = "true";
            message ("Fields must not be empty","error");
        }else {
            $deceased_graveno = $_POST["grave-no"];
        }

        $deceased_contactemail = $_POST["deceased-contactemail"];
        $deceased_contactno = $_POST["deceased-contactno"];
        $count = $_GET['count'] + 1;
        $plot_status = "occupied".$count;        

        if (empty($deceased_fname_error) && empty($deceased_lname_error) && empty($deceased_birthdate_error) && empty($deceased_deathdate_error) && empty($deceased_graveno_error) && empty($deceased_gender_error) && empty($deceased_agegroup_error) && empty($deceased_contactname_error)) {
            $sql = "INSERT INTO grave_record (record_name, record_birth, record_death, record_gender, record_agegroup, record_contactperson, record_contactno, record_contactemail, record_visibility, grave_id) VALUE (?,?,?,?,?,?,?,?,?,?)";
                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->bind_param("sssssssssi", $param_deceasedname, $param_birth, $param_death, $param_gender, $param_agegroup, $param_contactname, $param_contactno, $param_contactemail, $param_visibility, $param_graveid);
                    $param_deceasedname = $deceased_fname. " " .$deceased_mname. " " .$deceased_lname;
                    $param_birth = $deceased_birthdate;
                    $param_death = $deceased_deathdate;
                    $param_gender = $deceased_gender;
                    $param_agegroup = $deceased_agegroup;
                    $param_contactname = $deceased_contactname;
                    $param_contactno = $deceased_contactno;
                    $param_contactemail = $deceased_contactemail;
                    $param_visibility = 'public';
                    $param_graveid = $deceased_graveno;
                    if ($stmt->execute()) {
                        $update = "UPDATE grave_data SET status = '$plot_status' WHERE grave_no = '$deceased_graveno'";
                        if (mysqli_query($mysqli, $update)) {
                            message ("The record has been registered successfully","success");
                            header("location: ../index.php?page=record");
                        } else {
                            message ("Something went wrong please try again later","error");
                            header("location: ../index.php?page=record");    
                        } 
                    } else {
                        message ("Something went wrong please try again later","error");
                        header("location: ../index.php?page=record");    
                    }
                } else {
                    message ("Something went wrong please try again later","error");
                    header("location: ../index.php?page=record");
                }  
        } else {
            message ("Something went wrong please try again later","error");
            header("location: ../index.php?page=record");
        }                 
    }
    $stmt->close();
}

function update(){
    global $mysqli;
    $deceased_name = $deceased_gender = $deceased_agegroup = $deceased_contactname = $deceased_contactno = $deceased_contactemail = $deceased_birthdate = $deceased_deathdate = $deceased_graveno = "";
    $deceased_name_error = $deceased_gender_error = $deceased_agegroup_error = $deceased_contactname_error = $deceased_contactno_error = $deceased_contactemail_error = $deceased_birthdate_error = $deceased_deathdate_error = $deceased_graveno_error = "";
    $record_id = $_GET['record_id'];
    
    if(isset($_POST['btn-submit'])){
    
        if (empty($_POST["deceased-name"])) {
            $deceased_name_error = "true";
        }else {
            $deceased_name = $_POST["deceased-name"];
        }

        if (empty($_POST["deceased-birthday"])) {
            $deceased_birthdate_error = "true";
        }else {
            $deceased_birthdate = $_POST["deceased-birthday"];
        }

        if (empty($_POST["deceased-deathday"])) {
            $deceased_deathdate_error = "true";
        }else {
            $deceased_deathdate = $_POST["deceased-deathday"];
        }

        if (empty($_POST["deceased-gender"])) {
            $deceased_gender_error = "true";
        }else {
            $deceased_gender = $_POST["deceased-gender"];
        }

        if (empty($_POST["deceased-agegroup"])) {
            $deceased_agegroup_error = "true";
        }else {
            $deceased_agegroup = $_POST["deceased-agegroup"];
        }

        if (empty($_POST["deceased-contactname"])) {
            $deceased_contactname_error = "true";
        }else {
            $deceased_contactname = $_POST["deceased-contactname"];
        }

        if (empty($_POST["deceased-contactno"])) {
            $deceased_contactno_error = "true";
        }else {
            $deceased_contactno = $_POST["deceased-contactno"];
        }

        if (empty($_POST["deceased-contactemail"])) {
            $deceased_contactemail_error = "true";
        }else {
            $deceased_contactemail = $_POST["deceased-contactemail"];
        }

        if (empty($_POST["grave-no"])) {
            $deceased_graveno_error = "true";
            message ("Fields must not be empty","error");
        }else {
            $deceased_graveno = $_POST["grave-no"];
        }
                
        if (empty($deceased_name_error) && empty($deceased_birthdate_error) && empty($deceased_deathdate_error) && empty($deceased_graveno_error) && empty($deceased_gender_error) && empty($deceased_agegroup_error) && empty($deceased_contactname_error) && empty($deceased_contactno_error) && empty($deceased_contactemail_error)) {
            $sql = "UPDATE grave_record SET record_name = ?, record_birth = ?, record_death = ?, record_gender = ?, record_agegroup = ?, record_contactperson = ?, record_contactno = ?, record_contactemail = ?, grave_id = ? WHERE record_id = ?";
                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->bind_param("ssssssssis", $param_deceasedname, $param_birth, $param_death, $param_gender, $param_agegroup, $param_contactname, $param_contactno, $param_contactemail, $param_graveid, $param_recordid);
                    $param_deceasedname = $deceased_name;
                    $param_birth = $deceased_birthdate;
                    $param_death = $deceased_deathdate;
                    $param_gender = $deceased_gender;
                    $param_agegroup = $deceased_agegroup;
                    $param_contactname = $deceased_contactname;
                    $param_contactno = $deceased_contactno;
                    $param_contactemail = $deceased_contactemail;
                    $param_graveid = $deceased_graveno;
                    $param_recordid = $record_id;
                    if ($stmt->execute()) {
                        message ("The record has been registered successfully","success");
                        header("location: ../index.php?page=record");
                    } else {
                        message ("Something went wrong please try again later","error");
                        header("location: ../index.php?page=record");    
                    }
                } else {
                    message ("Something went wrong please try again later","error");
                    header("location: ../index.php?page=record");
                }  
        } else {
            message ("Something went wrong please try again later","error");
            header("location: ../index.php?page=record");
        }                 
    }
    $stmt->close();
}

function plot(){
    global $mysqli;
    $point = $coordinate = "";
    $point_error = $coordinate_error = "";
    if(isset($_POST['btn-insert'])){
    
        if (empty($_POST["plot-point"])) {
            $point_error = "true";
        }else {
            $point = $_POST["plot-point"];
        }

        if (empty($_POST["plot-coordinate"])) {
            $coordinate_error = "true";
        }else {
            $coordinate = $_POST["plot-coordinate"];
        }

        // SHOW TABLE STATUS LIKE 'grave_emp';
        $query = "SELECT COUNT(grave_no) as max_no FROM grave_data";
        $result = mysqli_query($mysqli, $query);
        $ai = mysqli_fetch_array($result);
        $max_id = $ai['max_no']+1;
                
        if (empty($plot_coordinate) && empty($plot_point)) {
            $sql = "INSERT INTO grave_data (grave_no, coordinates) VALUES (?,?)";
                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->bind_param("ss", $param_graveno, $param_coordinate);
                        $param_graveno = $max_id;
                        $param_coordinate = $point. ", " .$coordinate;
                    if ($stmt->execute()) {
                            message ("Plot has been inserted successfully","success");
                            header("location: ../index.php?page=map");    
                    } else {
                        message ("Something went wrong please try again later","error");
                        header("location: ../index.php?page=insert_plot");    
                    }
                    $stmt->close();
                } else {
                    message ("Something went wrong please try again later","error");
                    header("location: ../index.php?page=insert_plot");
                }  
        } else {
            message ("Something went wrong please try again later","error");
            header("location: ../index.php?page=insert_plot");
        }                 
    }
}

function img(){
    global $mysqli;
    $img_ext = $img_file = "";
    $img_error = "";
    $grave_id = $_GET['graveid'];
    
    if(isset($_POST['btn-save'])){
        if (empty($_FILES["grave-img"])) {
            $img_error = "true";
        }else {
            $img_file = $_FILES['grave-img']['name'];
            $img_ext = pathinfo($img_file, PATHINFO_EXTENSION);
        }
        $allowed = ['png', 'jpg', 'jpeg'];

        if (empty($img_error)) {
            if (!in_array($img_ext, $allowed)) {
                message ("You file extension must be .jpeg, .jpg, or .png","error");
                header("location: ../index.php?page=map");
            } else {
                $path = '../../../upload/';
                
                $maxid = mysqli_query($mysqli,"SELECT MAX(id) FROM grave_file");
                $row = mysqli_fetch_array($maxid);
                $img_file = ($row[0]+1) . '-' . $img_file;
                $created = @date('Y-m-d H:i:s');
                move_uploaded_file($_FILES['grave-img']['tmp_name'],($path . $img_file));

                $upload = "INSERT INTO grave_file (grave_filename, record_id, date_uploaded) VALUES (?,?,?)";
                if ($stmt = $mysqli->prepare($upload)) {
                    $stmt->bind_param("sis", $param_file, $param_id, $param_created);
                    $param_file = $img_file;
                    $param_id = $grave_id;
                    $param_created = $created;
                    if ($stmt->execute()) {
                        message ("Images has been uploaded successfuly","success");
                        header("location: ../index.php?page=map");
                    } else {
                        message ("Something went wrong please try again later");
                        header("location: ../index.php?page=map");    
                    }
                    $stmt->close();
                }
            }
        } else {
            message ("Something went wrong please try again later");
            header("location: ../index.php?page=map");
        }
    }
    $mysqli->close();
}

?>