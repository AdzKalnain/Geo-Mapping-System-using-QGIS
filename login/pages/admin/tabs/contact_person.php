<?php 
    $name = $_GET['name'];
?>
<div class="container-fluid">
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 font-weight-bold d-flex">
                <span class="mr-auto">Contact Person of <?php echo $name; ?></span>
            </p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0 table-bordered">
                    <?php 
                        $result = mysqli_query($mysqli, "SELECT * FROM grave_record WHERE record_name = '$name'");
                    ?>
                    <thead>
                        <tr>
                            <th>Contact Person</th>
                            <th>Contact Number</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>'.$row['record_contactperson'].'</td>';
                                echo '<td>'.$row['record_contactno'].'</td>';
                                echo '<td>'.$row['record_contactemail'].'</td>';   
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
