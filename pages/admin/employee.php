            <div class="shop-cards mx-5">
                <button class="btn btn-secondary mt-3">
                    <a href="<?php echo web_root; ?>pages/admin/index.php?page=add_employee" style="text-decoration: none; color: #ffff">    
                        <span>Add</span>
                    </a>
                </button>
                <?php 
                    $query = mysqli_query($mysqli, "SELECT * FROM grave_emp"); 
                    while ($row = mysqli_fetch_array($query)) {
                ?>
                <div class="shop-single shadow mt-3">
                    <div class="card-body">
                        <?php 
                            if($row['emp_status'] == "available") {
                                echo '<h5>';
                                echo '<span class="ti-user mr-2"></span>'.$row['emp_name'];
                                echo '</h5>';
                                echo '<h6>Earnings: </h6>';
                                echo '<h6>Task: </h6>';
                                // echo '<div class="dropdown">
                                //         <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                //         <div class="dropdown-menu" aria-labelledby="dropdownMore">   
                                //             <ul>
                                //                 <li>Grave No.2</li>
                                //             </ul>
                                //         </div> 
                                //     </div>';
                            }else {
                                echo '<h5>';
                                echo '<span class="ti-user mr-2"></span>'.$row['emp_name'];
                                echo '</h5>';
                                echo '<h6>Earnings: </h6>';
                                echo '<h6>Task: </h6>';
                            }
                        ?>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo web_root; ?>pages/admin/index.php?empid=<?php echo $row['emp_id'];?> & page=update_service">
                            <button type="button" class="btn btn-primary btn-sm">
                                <span class="ti-write"></span>
                            </button>
                        </a>
                        <?php
                            echo '<a href="function/shop_function.php?serviceid='.$row['emp_id'].' & function=delete">
                                    <button type="button" class="btn btn-danger btn-sm">
                                        <span class="ti-trash"></span>
                                    </button>
                                </a>';
                            if ($row['emp_status'] == 'available') {
                                echo '<a href="function/shop_function.php?serviceid='.$row['emp_id'].' & function=unlink">
                                        <button type="button" class="btn btn-success btn-sm">
                                            <span class="ti-link"></span>
                                        </button>
                                    </a>';
                            } else {
                                echo '<a href="function/shop_function.php?serviceid='.$row['emp_id'].' & function=link">
                                        <button type="button" class="btn btn-warning btn-sm">
                                            <span class="ti-unlink"></span>
                                        </button>
                                    </a>';
                            }
                            
                            if ($row['emp_status'] == "available") {
                                echo '<span class="float-right badge badge-success" style="color:white; font-size: 12px;">'.$row['emp_status'].'</span>';
                            } else {
                                echo '<span class="float-right badge badge-danger" style="color:white; font-size: 12px;">'.$row['emp_status'].'</span>';
                            }
                        ?>
                    </div>
                </div>
                <?php } ?>
            </div>
