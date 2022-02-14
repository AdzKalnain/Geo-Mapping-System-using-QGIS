            <!-- Payment -->
            <!-- <div class="col-lg-12 mb-2 shadow"> -->
                <div class="container-fluid">
                    

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
                            <?php
                                }
                            ?>
                        </div>
                        <div class="col-md-8">
                            <h4 class="mb-3">Billing address</h4>
                            
                            <form class="needs-validation" action="function/order_function.php?ordercost=<?php echo $product_cost; ?> & ordername=<?php echo $product_name; ?> & function=checkout" method="POST">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="ordererName">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="ordererName" name="ordererName" value="" required>
                                        <div class="invalid-feedback">
                                            Valid Name is required.
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="ordererEmail">Email</label>
                                    <input type="email" class="form-control" id="ordererEmail" name="ordererEmail" value="">
                                </div>

                                <div class="mb-3">
                                    <label for="ordererContact">Contact No.</label>
                                    <input type="number" class="form-control" id="ordererContact" name="ordererContact" value="" onkeypress="return (event.charCode !=8 && event.charCode == 0 || (event.charCode >= 48 && event.charCode <=57))">
                                </div>

                                <hr class="mb-4">
                                <h4 class="mb-3">Grave Info</h4>
                                <div class="mb-3">
                                    <label for="graveNo" class="form-label label mt-2">Deceased Grave No.</label>
                                    <input type="number" class="form-control" id="graveNo" name="graveNo" value="" onkeypress="return (event.charCode !=8 && event.charCode == 0 || (event.charCode >= 48 && event.charCode <=57))">
                                </div>

                                <div class="mb-3">
                                    <label for="deceasedName" class="form-label label mt-2">Deceased Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="deceasedName" name="deceasedName" value="" required>
                                </div>

                                <div class="mb-3">
                                    <label for="instruction" class="form-label label mt-2">Instruction</label>
                                    <textarea class="w-100" name="instruction" id="instruction" cols="2" rows="10" placeholder="Type your instruction here..."></textarea>
                                </div>

                                <hr class="mb-4">

                                <h4 class="mb-3">Extra Info</h4>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="cc-name">Order number</label>
                                        <input type="text" class="form-control" id="cc-name" name="orderNumber" placeholder="<?php echo generateCode(); ?>" value="<?php echo generateCode(); ?>" readonly>
                                    </div>
                                </div>

                                <hr class="mb-4">
                                <button class="btn btn-primary btn-lg btn-block mb-5" name="checkout" value="Submit">Save</button>
                            </form>
                        </div>
                    </div>

                </div>
            <!-- </div> -->