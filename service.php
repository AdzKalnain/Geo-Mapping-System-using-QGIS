<?php 
    session_start();
    include_once 'include/config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Services - Gravekeeper</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <!-- <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <!-- <link rel="stylesheet" href="assets/css/smoothproducts.css"> -->
    <link rel="stylesheet" href="assets/css/home.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Gravekeeper</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="service.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="map.php">Map</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page service-page">
        <section class="clean-block">
            <div class="container">

                

                <div class="block-heading">
                    <h2 class="text-secondary">Services</h2>
                    <p class="d-flex flex-row-reverse">
                        <?php
                            if(isset($_SESSION['status'])) {
                                echo $_SESSION['status'];
                                unset($_SESSION['status']);
                            }
                        ?>  
                    </p>
                </div>
                <div class="row">
                    <?php 
                        $query = mysqli_query($mysqli, "SELECT * FROM grave_services"); 
                        while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card mb-3">
                            <?php 
                                if ($row['service_availability'] == 'available') {
                                    echo '<div class="card-body">';
                                        echo '<h5>';
                                            echo '<span class="ti-shopping-cart mr-2"></span>'.$row['service_name'];
                                        echo '</h5>';
                                        echo '<span>P '.$row['service_cost'].'</span>';
                                        echo '<span class="badge badge-success ml-2" style="color:white; font-size: 12px;">'.$row['service_availability'].'</span>';
                                    echo '</div>';
                                    
                                    echo '<div class="card-footer">';
                                        echo '<a href="assets/function/checkout.php?service_id='.$row['service_id'].'" class="float-left">';
                                            echo '<button type="button" class="btn btn-primary btn-sm">';
                                                echo '<span class="ti-shopping-cart"></span>';
                                            echo '</button>';
                                        echo '</a>';
                                        
                                        echo '<span class="float-right text-muted">'.$row['service_completion'].' day/s</span>';
                                    echo '</div>';
                                } else {
                                echo '<div class="card-body">';
                                    echo '<h5>';
                                    echo '<span class="ti-shopping-cart mr-2"></span>'.$row['service_name'];
                                    echo '</h5>';
                                    echo '<span>P '.$row['service_cost'].'</span>';
                                    echo '<span class="badge badge-danger ml-2" style="color:white; font-size: 12px;">'.$row['service_availability'].'</span>';
                                echo '</div>';

                                echo '<div class="card-footer">';
                                    echo '<a href="#" class="float-left">';
                                        echo '<button type="button" class="btn btn-primary btn-sm" disabled>';
                                            echo '<span class="ti-shopping-cart"></span>';
                                        echo '</button>';
                                    echo '</a>';

                                    echo '<span class="float-right text-muted">'.$row['service_completion'].' day/s</span>';
                                echo '</div>';
                            } ?>
                        </div>
                    </div>
                    <?php 
                        }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>

</body>
</html>