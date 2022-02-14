<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Activity Log</h3>
    </div>
    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="activity-table">
                    <?php 
                        $result = mysqli_query($mysqli, "SELECT * FROM grave_activity ORDER BY act_date DESC");
                    ?>
                    <thead>
                        <tr>
                            <th>Activity</th>
                            <th>Personnel</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                echo '<td>'.$row['act_name'].'</td>';
                                echo '<td>'.$row['act_personnel'].'</td>';
                                echo '<td>'.$row['act_date'].'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
