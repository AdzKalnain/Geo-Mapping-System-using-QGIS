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

<?php
    if($_GET['key'] && $_GET['token']) {
        include "../include/config.php";
        $email = $_GET['key'];
        $token = $_GET['token'];

        $query = mysqli_query($mysqli,"SELECT * FROM `grave_user` WHERE `user_email_link`='".$token."' and `user_email`='".$email."';");
        $d = date('Y-m-d H:i:s');
        if (mysqli_num_rows($query) > 0) {
            $row= mysqli_fetch_array($query);
            if($row['creation_date'] == NULL){
                mysqli_query($mysqli,"UPDATE grave_user set creation_date ='" . $d . "', user_status = 'verified' WHERE user_email='" . $email . "'");
                $msg = "Congratulations! Your email has been verified. Click here to <a href='index.php'>Login</a>";
            } else {
                $msg = "You have already verified your account";
            }
        } else {
            $msg = "This email has not been registered with us";
        }

    } else {
        $msg = "Something goes wrong.";
    }
?>

    <form class="form-signup" action="" method="POST">
        <div class="text-center mb-4 form-title">
            <h1 class="h3 mb-5 font-weight-normal">Gravekeeper</h1>
        </div>
        <div class="text-center">
            <p><?php echo $msg; ?></p>
        </div>

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