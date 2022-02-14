<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
      <title>User Registration with Email Verification in PHP</title>
       <!-- CSS -->
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container mt-5">
          <div class="card">
            <div class="card-header text-center">
              User Registration with Email Verification in PHP
            </div>
            <div class="card-body">
              <form action="store-registration-send-email.php" method="post">

                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name" class="form-control" id="name" required="">
                </div>                                

                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required="">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" name="password" class="form-control" id="password" required="">
                </div>                   

                <div class="form-group">
                  <label for="exampleInputEmail1">Confirm Password</label>
                  <input type="password" name="cpassword" class="form-control" id="cpassword" required="">
                </div>   

                <input type="submit" name="password-reset-token" class="btn btn-primary">
              </form>
            </div>
          </div>
      </div>

   </body>
</html>