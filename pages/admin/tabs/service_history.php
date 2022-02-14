<?php 
    $grave = $_GET['graveno'];
?>
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold d-flex">
                <span class="mr-auto">Order History of Grave No. <?php echo $grave; ?></span>
            </p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="deceased-table">
                    <?php 
                        $result = mysqli_query($mysqli, "SELECT * FROM grave_orders WHERE selected_grave = '$grave'");
                    ?>
                    <thead>
                        <tr>
                            <th>Order Number</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Cost</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>'.$row['order_refnumber'].'</td>';
                                echo '<td>'.$row['order_name'].'</td>';
                                echo '<td>'.$row['order_date'].'</td>';
                                echo '<td>'.$row['order_total'].'</td>';
                                if ($row['order_status'] == "Completed") {    
                                    echo '<td><span class="badge badge-primary">'.$row['order_status'].'</span></td>';
                                    echo '</tr>';
                                } elseif ($row['order_status'] == "Active") {
                                    echo '<td><span class="badge badge-success">'.$row['order_status'].'</span></td>';
                                    echo '</tr>';
                                } else {
                                    echo '<td><span class="badge badge-warning">'.$row['order_status'].'</span></td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
