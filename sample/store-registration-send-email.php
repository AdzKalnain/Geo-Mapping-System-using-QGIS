<?php
 require_once('PHPMailer-master/src/PHPMailer.php');
 require_once('PHPMailer-master/src/SMTP.php');
 require_once('PHPMailer-master/src/Exception.php');
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;

if(isset($_POST['password-reset-token']) && $_POST['email'])
{
    include "db.php";

    $result = mysqli_query($conn,"SELECT * FROM users1 WHERE email='" . $_POST['email'] . "'");

    $row= mysqli_num_rows($result);

    if($row <= 0)
    {
      
       $token = md5($_POST['email']).rand(10,9999);

       mysqli_query($conn, "INSERT INTO users1 (name, email, email_verification_link ,password) VALUES('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $token . "', '" . md5($_POST['password']) . "')");

        $link = "<a href='localhost/email-verification/verify-email.php?key=".$_POST['email']."&token=".$token."'>Click and Verify Email</a>";

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
        $mail->AddAddress($_POST['email'], $_POST['name']);
        $mail->Subject  =  'Verification';
        $mail->IsHTML(true);
        $mail->Body    = 'Click On This Link to Verify Email '.$link.'';
        if($mail->Send())
        {
          echo "Check Your Email inbox and Click on the email verification link.";
        }
        else
        {
          echo "Mail Error - >".$mail->ErrorInfo;
        }
    }
    else
    {
      echo "You have already registered with us. Check Your email box and verify email or try signing in.";
    }
}
?>