<?php 
    $refnumber = $_GET['refnumber'];
?>
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between">
            <p class="text-primary m-0 font-weight-bold d-flex">
                <span class="mr-auto">Order Details</span>
            </p>
            <button id="btnPrint" class="btn btn-outline-secondary btn-sm print" onclick="PrintDiv('dataTable')">Print</button>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0 table-bordered">
                    <?php 
                        $result = mysqli_query($mysqli, "SELECT * FROM grave_orders WHERE order_refnumber = '$refnumber'");
                    ?>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<th scope="row" width="150">Order Code:</th><td>'.$row['order_refnumber'].'</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<th scope="row" width="150">Orderer Name:</th><td>'.$row['orderer_name'].'</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<th scope="row" width="150">Email:</th><td>'.$row['orderer_email'].'</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<th scope="row" width="150">Contact Number:</th><td>'.$row['orderer_contact'].'</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<th scope="row" width="150">Order Name:</th><td>'.$row['order_name'].'</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<th scope="row" width="150">Grave No:</th><td>'.$row['selected_grave'].'</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<th scope="row" width="150">Deceased Name:</th><td>'.$row['deceased_name'].'</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<th scope="row" width="150">Order Total:</th><td>'.$row['order_total'].'</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<th scope="row" width="150">Payment Status:</th><td>'.$row['payment_status'].'</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<th scope="row" width="150">Order Status:</th><td>'.$row['order_status'].'</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<th scope="row" width="150">Order Date:</th><td>'.$row['order_date'].'</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<th scope="row" width="150">Instruction:</th><td>'.$row['instruction'].'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
