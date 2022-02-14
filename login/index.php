<?php

    session_start();

    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        // if ($_SESSION["user_type"] == "admin") {
        //     header("location: pages/admin/index.php");
        //     exit;
        // } 
        if ($_SESSION["user_type"] == "admin") {
            header("location: ../pages/admin/index.php");
            exit;
        } 
        else{
            header("location: ../pages/user/index.php");
            exit;
        }
    }

    require_once "../include/config.php";

    $login_email = $login_password = "";
    $login_email_error = $login_password_error = $login_error = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty(trim($_POST["inputEmail"]))) {
            $login_email_error = "Please enter your email address";
        } else{
            $login_email = trim($_POST["inputEmail"]);
        }
        
        if (empty(trim($_POST["inputPassword"]))) {
            $login_password_error = "Please enter your password.";
        } else{
            $login_password = trim($_POST["inputPassword"]);
        }

        //validate the account information
        if(empty($login_email_error) && empty($login_password_error)){
            
            $sql = "SELECT user_id, user_type, user_name, user_email, user_status, creation_date, user_password FROM grave_user WHERE user_email = ?";
            if($stmt = $mysqli->prepare($sql)){
                $stmt->bind_param("s", $param_email);
                $param_email = $login_email;
                
                if($stmt->execute()){
                    $stmt->store_result();
                    
                    if($stmt->num_rows == 1){   
                        $stmt->bind_result($login_id, $login_level, $login_username, $login_email, $status, $joined, $hashed_password);
                        if($stmt->fetch()){
                            if ($status == "verified") {
                                if(password_verify($login_password, $hashed_password)){
                                    if ($login_level == "admin") {
                                        session_start();
                                        $_SESSION["loggedin"] = true;
                                        $_SESSION["id"] = $login_id;
                                        $_SESSION["user_type"] = $login_level;
                                        $_SESSION["email"] = $login_email;
                                        $_SESSION["name"] = $login_username;
                                        $_SESSION["joined"] = $joined;
                                        header("location: ../pages/admin/index.php");
                                    } 
                                    elseif ($login_level == "user") {
                                        session_start();
                                        $_SESSION["loggedin"] = true;
                                        $_SESSION["id"] = $login_id;
                                        $_SESSION["user_type"] = $login_level;
                                        $_SESSION["email"] = $login_email;
                                        $_SESSION["name"] = $login_username;
                                        $_SESSION["joined"] = $joined;                            
                                        header("location: ../pages/user/index.php");
                                
                                    } elseif ($login_level == "clerk") {
                                        session_start();
                                        $_SESSION["loggedin"] = true;
                                        $_SESSION["id"] = $login_id;
                                        $_SESSION["user_type"] = $login_level;
                                        $_SESSION["email"] = $login_email;
                                        $_SESSION["name"] = $login_username;
                                        $_SESSION["joined"] = $joined;
                                        header("location: ../pages/admin/index.php");
                                    }

                                } else{
                                    $login_error = "Invalid email or password";
                                }
                            } else {
                                $login_error = "Invalid email or password";
                            }
                        }
                        
                    } else{
                        $login_error = "Invalid email or password";
                    }

                } else{
                    echo "Something went wrong. Please try again later";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Gravekeeper</title>
    
    <!-- Bootstrap and other cdn declaration -->
    <link rel="stylesheet" href="../pages/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../pages/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../pages/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../pages/assets/fonts/fontawesome5-overrides.min.css">

    <!-- Style Declaration -->
    <link rel="stylesheet" href="../pages/assets/css/login.css">

</head>
<body>

    <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="text-center mb-4">
            <h3 class="mb-5">Gravekeeper</h3>
            <?php 
                if(!empty($login_error)){
                    echo '<div class="alert alert-danger">' . $login_error . '</div>';
                }        
            ?>
        </div>

        <div class="form-label-group">
            <input type="text" id="inputEmail" class="form-control form-control-lg <?php echo (!empty($login_email_error)) ? 'is-invalid' : ''; ?>" name="inputEmail" value="<?php echo $login_email; ?>" placeholder="">
            <span class="error-feedback text-danger" <?php if(empty($login_password_error)) { echo 'hidden';} ?>><?php echo $login_email_error ."<br>" ?></span>
            <label for="inputEmail">Email</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control form-control-lg <?php echo (!empty($login_password_error)) ? 'is-invalid' : ''; ?>" name="inputPassword" value="<?php echo $login_password; ?>" placeholder="">
            <span class="error-feedback text-danger" <?php if(empty($login_password_error)) { echo 'hidden';} ?>><?php echo $login_password_error ."<br>" ?></span>
            <label for="inputPassword">Password</label>
        </div>


        <div class="d-flex justify-content-between">
            <button class="btn btn-lg btn-secondary btn-block mr-2" name="btn-sign-in">Sign in</button>
            <a href="../index.php" class="back-btn text-decoration-none"><input type="button" class="btn btn-lg btn-outline-secondary btn-block" name="btn-back" value="Back"></input></a>
        </div>
        
        <div class="registration">
            <p class="mt-2">Don't have an account? <a href="signup.php">Sign up now</a></p>
            <!-- <p class="mt-1"><a href="../index.php" class="text-secondary"><span class="fas fa-angle-left"></span> Back</a></p> -->
        </div>
        
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Gravekeeper 2021</span></div>
            </div>
        </footer>
        <!-- <p class="mt-5 mb-3 text-muted text-center">&copy; Gravekeeper 2021</p> -->

    </form>

    <!-- JS Declaration -->
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