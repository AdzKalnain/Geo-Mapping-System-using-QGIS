<!-- <div class="container-fluid mb-3">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold d-flex">
                <span class="mr-auto">Deceased under <?php echo $_SESSION["name"];?></span>
            </p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="deceased-table">
                    <?php
                        $owner = $_SESSION["name"];
                        $deceased = mysqli_query($mysqli, "SELECT * FROM grave_record WHERE record_contactperson =  '$owner'");
                    ?>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Grave No.</th>
                            <th>Gender</th>
                            <th>Age Group</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_array($deceased)) {
                                echo '<tr>';
                                    echo '<td>'.$row['record_name'].'</td>';
                                    echo '<td>'.$row['grave_id'].'</td>';
                                    echo '<td>'.$row['record_gender'].'</td>';
                                    echo '<td>'.$row['record_agegroup'].'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->


<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold d-flex">
                <span class="mr-auto">Order Info</span>
            </p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="deceased-table">
                    <?php
                        $orderer = $_SESSION["name"];
                        $result = mysqli_query($mysqli, "SELECT * FROM grave_orders WHERE orderer_name =  '$orderer'");
                    ?>
                    <thead>
                        <tr>
                            <th>Orderer</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Cost</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                    echo '<td>'.$row['orderer_name'].'</td>';
                                    echo '<td>'.$row['order_name'].'</td>';
                                    echo '<td>'.$row['order_date'].'</td>';
                                    echo '<td>'.$row['order_total'].'</td>';
                                    if ($row['order_status'] == 'Active') {
                                        echo '<td><span class="badge badge-primary">'.$row['order_status'].'</span></td>';
                                    } elseif ($row['order_status'] == 'Pending') {
                                        echo '<td><span class="badge badge-warning">'.$row['order_status'].'</span></td>';
                                    } elseif ($row['order_status'] == 'Completed') {
                                        echo '<td><span class="badge badge-secondary">'.$row['order_status'].'</span></td>';
                                    }
                                    echo '<td>
                                            <div class="dropdown no-arrow">
                                                <button class="btn btn-outline-secondary btn-sm rounded-circle" type="button" id="moreMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="fas fa-ellipsis-h"></span>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="moreMenu">
                                                    <a class="dropdown-item" href="index.php?refnumber='.$row['order_refnumber'].' & page=order_detail">More Details</a>
                                                </div>
                                            </div>
                                        </td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
