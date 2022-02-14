            <div class="table-responsive table mt-4" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="history-table">
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
                            $sql = mysqli_query($mysqli, "SELECT * FROM grave_orders WHERE order_status = 'Completed'");
                            while ($row = mysqli_fetch_array($sql)) {
                                echo '<tr>';
                                    echo '<td>'.$row['orderer_name'].'</td>';    
                                    echo '<td>'.$row['order_name'].'</td>';
                                    echo '<td>'.$row['order_date'].'</td>';
                                    echo '<td>'.$row['order_total'].'</td>';
                                    echo '<td><span class="badge badge-success">'.$row['order_status'].'</span></td>';
                                    echo '<td>
                                        <div class="dropdown no-arrow">
                                            <button class="btn btn-outline-secondary btn-sm rounded-circle" type="button" id="moreMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="fas fa-ellipsis-h"></span>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="moreMenu">
                                                <a class="dropdown-item" href="index.php?refnumber='.$row['order_refnumber'].' & page=order_details">More Details</a>
                                            </div>
                                        </div>
                                    </td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>