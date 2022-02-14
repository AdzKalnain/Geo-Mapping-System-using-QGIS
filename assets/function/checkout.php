<?php 
    include_once '../../include/config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Services - Gravekeeper</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="../css/smoothproducts.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="../../index.php">Gravekeeper</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="../../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="../../service.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../map.php">Map</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../contact.php">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page service-page">
        <div class="container-fluid clean-block dark">
            
            <?php  
                $product_id = $_GET['service_id'];
                
                function generateCode ($length = 10) {
                    $character = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $characterlength = strlen($character);
                    $randomcode = '';
                    for ($i = 0; $i < $length; $i++) {
                        $randomcode .= $character[rand(0, $characterlength - 1)];
                    }
                    return $randomcode;
                }
            ?>

            <div class="py-5 text-center">
                <h2>Order form</h2>
            </div>

            <div class="row mx-5">
                <div class="col-md-4 mb-4">
                    <?php 
                        $service_query = mysqli_query($mysqli, "SELECT * FROM grave_services WHERE service_id = $product_id");
                        while ($service = mysqli_fetch_array($service_query)) {
                            $product_name = $service['service_name'];
                            $product_cost = $service['service_cost'];
                    ?>
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Service Info</span>
                        </h4>
                        <div class="mb-3">
                            <label for="service">Service</label>
                            <input type="text" class="form-control" id="service" name="service" value="<?php echo $service['service_name']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="service_cost">Service Cost</label>
                            <input type="text" class="form-control" id="service_cost" name="service_cost" value="<?php echo $service['service_cost']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <p class="text-muted"><small>Note: Please proceed to the management office to pay the service you have requested</small></p>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="col-md-8">
                    <h4 class="mb-3">Billing address</h4>
                    
                    <form class="needs-validation" action="function.php?ordercost=<?php echo $product_cost; ?>&ordername=<?php echo $product_name; ?>&function=checkout" method="POST">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="ordererName">Name</label>
                                <input type="text" class="form-control" id="ordererName" name="ordererName" value="" required>
                                <div class="invalid-feedback">
                                    Valid Name is required.
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="ordererEmail">Email</label>
                            <input type="email" class="form-control" id="ordererEmail" name="ordererEmail" value="" required>
                        </div>

                        <div class="mb-3">
                            <label for="ordererContact">Contact No.</label>
                            <input type="number" class="form-control" id="ordererContact" name="ordererContact" value="" onkeypress="return (event.charCode !=8 && event.charCode == 0 || (event.charCode >= 48 && event.charCode <=57))" required>
                        </div>

                        <hr class="mb-4">
                        <h4 class="mb-3">Grave Info</h4>
                        <div class="mb-3">
                            <label for="graveNo" class="form-label label mt-2">Deceased Grave No.</label>
                            <input type="number" class="form-control" id="graveNo" name="graveNo" value="" onkeypress="return (event.charCode !=8 && event.charCode == 0 || (event.charCode >= 48 && event.charCode <=57))" required>
                        </div>

                        <div class="mb-3">
                            <label for="deceasedName" class="form-label label mt-2">Deceased Name</label>
                            <input type="text" class="form-control" id="deceasedName" name="deceasedName" value="" required>
                        </div>

                        <div class="mb-3">
                            <label for="instruction" class="form-label label mt-2">Instruction</label>
                            <textarea class="w-100" name="instruction" id="instruction" cols="2" rows="10" placeholder="Type your instruction here..."></textarea>
                        </div>
                        <hr class="mb-4">

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="cc-name">Order number</label>
                                <input type="text" class="form-control" id="cc-name" name="orderNumber" placeholder="<?php echo generateCode(); ?>" value="<?php echo generateCode(); ?>" readonly>
                            </div>
                        </div>

                        <hr class="mb-4">
                        <button class="btn btn-primary btn-lg btn-block" name="checkout" value="Submit">Send</button>
                    </form>
                </div>
            </div>

        </div>
    </main>
    <footer class="page-footer">
        <div class="footer-copyright">
            <p>© 2021 Gravekeeper</p>
        </div>
    </footer>
    <script src="../js/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="../js/smoothproducts.min.js"></script>
    <script src="../js/theme.js"></script>
</body>

</html>
            