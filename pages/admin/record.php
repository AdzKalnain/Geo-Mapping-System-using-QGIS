                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold d-flex">
                                <span class="mr-auto">Deceased Info</span>
                                <span><a href="index.php?page=insert"><button class="btn btn-secondary btn-sm">Insert</button></a></span>
                                <!-- <span><a href="index.php?page=merge_record"><button class="btn btn-outline-secondary btn-sm">Merge</button></a></span> -->
                            </p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="deceased-table">
                                    <?php 
                                        $result = mysqli_query($mysqli, "SELECT * FROM grave_record 
                                        LEFt JOIN grave_data ON grave_record.grave_id=grave_data.id WHERE status = 'occupied1' OR status = 'occupied2' OR status = 'occupied3'");
                                    ?>
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Grave no.</th>
                                            <th>Gender</th>
                                            <th>Birth Date</th>
                                            <th>Death Date</th>
                                            <th>Age Group</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            while ($row = mysqli_fetch_array($result)) {
                                                $nametrim = str_replace(',','</br>',$row['record_name']);
                                                $birthtrim = str_replace(',','</br>',$row['record_birth']);
                                                $deathtrim = str_replace(',','</br>', $row['record_death']);
                                                echo '<tr>';
                                                echo '<td>'.$nametrim.'</td>';
                                                echo '<td>'.$row['grave_no'].'</td>';
                                                echo '<td>'.$row['record_gender'].'</td>';
                                                echo '<td>'.$birthtrim.'</td>';
                                                echo '<td>'.$deathtrim.'</td>';
                                                echo '<td>'.$row['record_agegroup'].'</td>';
                                                echo '<td>
                                                    <div class="dropdown no-arrow">
                                                        <button class="btn btn-outline-secondary btn-sm rounded-circle" type="button" id="moreMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="fas fa-ellipsis-h"></span>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="moreMenu">
                                                            <a class="dropdown-item" href="index.php?graveno='.$row['grave_no'].' & page=service_history">Service History</a>
                                                            <a class="dropdown-item" href="index.php?name='.$nametrim.' & page=contact_person">Contact Person</a>
                                                            <a class="dropdown-item" href="index.php?id='.$row['record_id'].' & page=edit_record">Edit</a>
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
            