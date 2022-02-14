<?php

    require_once ("../include/config.php");
    require_once('../include/PHPMailer-master/src/PHPMailer.php');
    require_once('../include/PHPMailer-master/src/SMTP.php');
    require_once('../include/PHPMailer-master/src/Exception.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $user_firstname = $user_lastname = $user_email = $user_password = $user_confirm_password = "";
    $firstname_error = $lastname_error = $email_error = $password_error = $confirm_password_error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //validate user firstname
        if (empty(trim($_POST["inputFirstname"]))) {
            $firstname_error = "Please enter your firstname";
        }elseif (!preg_match('/^[a-zA-Z]+$/', trim($_POST["inputFirstname"]))) {
            $firstname_error = "Firstname can only contain letters";
        }else {
            $user_firstname = trim($_POST["inputFirstname"]);
        }

        //validate user lastname
        if (empty(trim($_POST["inputLastname"]))) {
            $lastname_error = "Please enter your lastname";
        }elseif (!preg_match('/^[a-zA-Z]+$/', trim($_POST["inputLastname"]))) {
            $lastname_error = "Lastname can only contain letters";
        }else {
            $user_lastname = trim($_POST["inputLastname"]);
        }

        //validate user email
        if (empty(trim($_POST["inputEmail"]))) {
            $email_error = "Please enter a email";
        }else {
            $sql = "SELECT * FROM grave_user WHERE user_email = ?";
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("s", $param_email);
                $param_email = trim($_POST["inputEmail"]);
                if ($stmt->execute()) {
                    $stmt->store_result();
                    if($stmt->num_rows == 1) {
                        $email_error = "This email is already taken";
                    }else {
                        $user_email = trim($_POST["inputEmail"]);
                    }
                }else {
                    echo "Something went wrong please try again later.";
                }
                $stmt->close();
            }
        }

        //validate user password
        if (empty(trim($_POST["inputPassword"]))) {
            $password_error = "Please enter a password";     
        } elseif (strlen(trim($_POST["inputPassword"])) < 6) {
            $password_error = "Password must have atleast 6 characters";
        }else {
            $user_password = trim($_POST["inputPassword"]);
        }
        
        //confirm password
        if(empty(trim($_POST["inputConfirmpassword"]))){
            $confirm_password_error = "Please confirm password";     
        } else{
            $user_confirm_password = trim($_POST["inputConfirmpassword"]);
            if (empty($password_err) && ($user_password != $user_confirm_password)) {
                $confirm_password_error = "Password did not match";
            }
        }

        //Insert the Statement
        if (empty($firstname_error) && empty($lastname_error) && empty($email_error) && empty($password_error) && empty($confirm_password_error)) {
            $user_email_link = md5(trim($_POST["inputEmail"])).rand(10,9999);
            $sql = "INSERT INTO grave_user (user_name, user_type, user_email, user_email_link, user_password, user_status) VALUES (?, ?, ?, ?, ?, ?)";
                if ($stmt = $mysqli->prepare($sql)) {
                    
                    $stmt->bind_param("ssssss", $param_name, $param_usertype ,$param_email, $param_email_link, $param_password, $param_status);
                    $param_name = $user_firstname. " " .$user_lastname;
                    $param_usertype = "user";
                    $param_email = $user_email;
                    $param_email_link = $user_email_link;
                    $param_password = password_hash($user_password, PASSWORD_DEFAULT);
                    $param_status = "unverified";

                    if ($stmt->execute()) {
                        $date = date('Y-m-D');
                        $link = "<a href='localhost/webmap/login/signup-confirmation.php?key=".$user_email."&token=".$user_email_link."'>Verify</a>";
                        $mail = new PHPMailer();

                        $mail->CharSet =  "utf-8";
                        $mail->IsSMTP();
                        $mail->SMTPAuth = true;                  
                        $mail->Username = "gravekeeper.inc@gmail.com";
                        $mail->Password = "Gravekeeper12161998";
                        $mail->SMTPSecure = "ssl";  
                        $mail->Host = "smtp.gmail.com";
                        $mail->Port = "465";
                        $mail->From='gravekeeper.inc@gmail.com';
                        $mail->FromName='Gravekeeper';
                        $mail->AddAddress($user_email, $user_firstname.''.$user_lastname);
                        $mail->Subject  =  'Verification';
                        $mail->IsHTML(true);
                        // $mail->msgHTML(file_get_contents('message.html'));
                        // $mail->Body    = 'Click On This Link to Verify Email '.$link.'';
                        $html = file_get_contents('message.html');
                        $html = str_replace("[receiver name]",$user_firstname.''.$user_lastname,$html);
                        $html = str_replace("[date today]",$date,$html);
                        $html = str_replace("[[key]]]",$user_email,$html);
                        $html = str_replace("[[token]]]",$user_email_link,$html);
                        $mail->Body = $html;
                        // $mail->str_replace("[receiver name]",$user_firstname.''.$user_lastname,$mail);
                        if($mail->Send())
                        {
                        $mess = "Check Your Email inbox and Click on the email verification link.";
                        header("location: signup-board.php?message=$mess");
                        }
                        else
                        {
                        echo "Mail Error - >".$mail->ErrorInfo;
                        }
                    }else {
                        echo "Something went wrong please try again later";
                    }

                    $stmt->close();

                }
        }

        $mysqli->close();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content=""><title>Gravekeeper | Sign up</title>

    <!-- CSS Declaration -->
    <link rel="stylesheet" href="../pages/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../pages/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../pages/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../pages/assets/fonts/fontawesome5-overrides.min.css">

    <link rel="stylesheet" href="../pages/assets/css/registration.css">

</head>
<body>

    <form class="form-signup" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="text-center mb-4 form-title">
            <h1 class="h3 mb-5 font-weight-normal">Gravekeeper</h1>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-label-group">
                    <input type="text" id="inputFirstname" class="form-control form-control-lg <?php echo (!empty($firstname_error)) ? 'is-invalid' : ''; ?>" name="inputFirstname" value="<?php echo $user_firstname; ?>" placeholder="">
                    <label for="inputFirstname">Firstname</label>
                    <span class="error-feedback text-danger" <?php if(empty($firstname_error)) { echo 'hidden';} ?>><?php echo $firstname_error ."<br>" ?></span>
                </div>
            </div>
            
            <div class="col-6">
                <div class="form-label-group">
                    <input type="text" id="inputLastname" class="form-control form-control-lg <?php echo (!empty($lastname_error)) ? 'is-invalid' : ''; ?>" name="inputLastname" value="<?php echo $user_lastname; ?>" placeholder="">
                    <label for="inputLastname">Lastname</label>
                    <span class="error-feedback text-danger" <?php if(empty($lastname_error)) { echo 'hidden';} ?>><?php echo $lastname_error ."<br>" ?></span>
                </div>
            </div>

            <div class="col-12">
                <div class="form-label-group">
                    <input type="email" id="inputEmail" class="form-control form-control-lg <?php echo (!empty($email_error)) ? 'is-invalid' : ''; ?>" name="inputEmail" value="<?php echo $user_email; ?>" placeholder="">
                    <label for="inputEmail">Email</label>
                    <span class="error-feedback text-danger" <?php if(empty($email_error)) { echo 'hidden';} ?>><?php echo $email_error ."<br>" ?></span>
                </div>
            </div>

            <div class="col-12">
                <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control form-control-lg <?php echo (!empty($password_error)) ? 'is-invalid' : ''; ?>" name="inputPassword" value="<?php echo $user_password; ?>" placeholder="">
                    <label for="inputPassword">Password</label>
                    <span class="error-feedback text-danger" <?php if(empty($password_error)) { echo 'hidden';} ?>><?php echo $password_error ."<br>" ?></span>
                </div>
            </div>

            <div class="col-12">
                <div class="form-label-group">
                    <input type="password" id="inputConfirmpassword" class="form-control form-control-lg <?php echo (!empty($confirm_password_error)) ? 'is-invalid' : ''; ?>" name="inputConfirmpassword" value="<?php echo $user_confirm_password; ?>" placeholder="">
                    <label for="inputConfirmpassword">Confirm password</label>
                    <span class="error-feedback text-danger" <?php if(empty($confirm_password_error)) { echo 'hidden';} ?>><?php echo $confirm_password_error ."<br>" ?></span>
                </div>
            </div>
        </div>

        <button class="btn btn-lg btn-secondary btn-block" name="btn-signup" value="Submit">Sign up</button>
        
        <div class="form-redirect">
            <p class="mt-2">Already have an account? <a href="index.php">Sign in now</a></p>
        </div>
        
        <p class="mt-5 mb-3 text-muted text-center form-footer">&copy; Gravekeeper 2021</p>

    </form>

    <script src="../pages/assets/js/jquery.min.js"></script>
    <script src="../pages/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../pages/assets/js/chart.min.js"></script>
    <script src="../pages/assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="../pages/assets/js/theme.js"></script>

    <!--This javascript prevent the resubmission of form when refresh or button(f5) is click-->
    <script>
        if (window.history.replaceState) {
          window.history.replaceState (null, null, window.location.href);
        }
    </script>

</body>
</html>