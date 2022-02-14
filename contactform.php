<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us - Gravekeeper</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
    <link rel="stylesheet" href="assets/css/home.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Gravekeeper</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="map.php">Map</a></li>
                    <li class="nav-item"><a class="nav-link active" href="contact.php">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="login/index.php">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page contact-us-page">
        <section class="clean-block clean-form">
            <div class="container">
                <div class="block-heading">
                        <?php
                            if (! empty($message)) {
                        ?>
                                <p class='text-<?php echo $type; ?> Message'><small><?php echo $message; ?></small></p>
                        <?php
                            }
                        ?>
                    <h2 class="text-secondary">Contact Us</h2>
                    <p></p>
                </div>
                <form name="frmContact" id="" frmContact"" method="POST"
                    action="" enctype="multipart/form-data"
                    onsubmit="return validateContactForm()">
                    <div class="form-group">
                        <label for="userName">Name</label>
                        <span id="userName-info" class="info text-danger"></span>
                        <input class="form-control" type="text" name="userName" id="userName">
                    </div>
                    <div class="form-group">
                        <label for="userEmail">Email</label>
                        <span id="userEmail-info" class="info text-danger"></span>
                        <input class="form-control" type="email" name="userEmail" id="userEmail">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <span id="subject-info" class="info text-danger"></span>
                        <input class="form-control" type="text" name="subject" id="subject">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <span id="userMessage-info" class="info text-danger"></span>
                        <textarea class="form-control" name="content" id="content"></textarea>
                    </div>
                    <div class="form-group"><button class="btn btn-primary btn-block" name="send" type="submit" value="Send">Send</button></div>
                </form>

            </div>
        </section>
    </main>
    <footer class="page-footer">
        <div class="footer-copyright">
            <p>© 2021 Gravekeeper</p>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>

    <script type="text/javascript">
        function validateContactForm() {
            var valid = true;

            $(".info").html("");
            $(".input-field").css('border', '#e0dfdf 1px solid');
            var userName = $("#userName").val();
            var userEmail = $("#userEmail").val();
            var subject = $("#subject").val();
            var content = $("#content").val();
            
            if (userName == "") {
                $("#userName-info").html(" Required.");
                $("#userName").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (userEmail == "") {
                $("#userEmail-info").html(" Required.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
            {
                $("#userEmail-info").html("Invalid Email Address.");
                $("#userEmail").css('border', '#e66262 1px solid');
                valid = false;
            }

            if (subject == "") {
                $("#subject-info").html(" Required.");
                $("#subject").css('border', '#e66262 1px solid');
                valid = false;
            }
            if (content == "") {
                $("#userMessage-info").html(" Required.");
                $("#content").css('border', '#e66262 1px solid');
                valid = false;
            }
            return valid;
        }
    </script>

</body>
</html>