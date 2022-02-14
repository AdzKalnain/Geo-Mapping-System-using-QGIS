            <div class="table-responsive table mt-4" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table" id="new-table">
                    <?php
                        $result = mysqli_query($mysqli, "SELECT * FROM grave_orders WHERE order_status = 'Pending'");
                    ?>
                    <thead>
                        <tr>
                            <!-- <th>Code</th> -->
                            <th>Orderer</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Cost</th>
                            <th>Payment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while ($row = mysqli_fetch_array($result)) {
                                echo '<tr>';
                                    // echo '<td>'.$row['order_refnumber'].'</td>';    
                                    echo '<td>'.$row['orderer_name'].'</td>';
                                    echo '<td>'.$row['order_name'].'</td>';
                                    // echo '<td>'.rtrim($row['selected_grave'],',').'</td>';
                                    echo '<td>'.$row['order_date'].'</td>';
                                    echo '<td>'.$row['order_total'].'</td>';
                                    echo '<td><span class="badge badge-warning">'.$row['payment_status'].'</span></td>';
                                    // echo '<td><span class="badge badge-warning">'.$row['order_status'].'</span></td>';
                                    echo '<td>
                                            <div class="dropdown no-arrow">
                                                <button class="btn btn-outline-secondary btn-sm rounded-circle" type="button" id="moreMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="fas fa-ellipsis-h"></span>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="moreMenu">
                                                    <a class="dropdown-item" href="index.php?refnumber='.$row['order_refnumber'].' & page=order_details">More Details</a>
                                                    <a class="dropdown-item" href="function/order_function.php?refnumber='.$row['order_refnumber'].'& function=pay">Mark as Paid</a>
                                                    <a class="dropdown-item" href="function/order_function.php?refnumber='.$row['order_refnumber'].'& function=cancel">Cancel Order</a>
                                                </div>
                                            </div>
                                            </td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>