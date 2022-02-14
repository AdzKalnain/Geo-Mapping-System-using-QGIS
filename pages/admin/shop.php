    <div class="shop-cards mx-5">
        <button class="btn btn-secondary mt-3">
            <a href="<?php echo web_root; ?>pages/admin/index.php?page=add_service" style="text-decoration: none; color: #ffff">    
                <span>Create</span>
            </a>
        </button>
        <?php 
            $query = mysqli_query($mysqli, "SELECT * FROM grave_services"); 
            while ($row = mysqli_fetch_array($query)) {
        ?>
        <div class="shop-single shadow mt-3">
            <div class="card-body">
                <div>
                    <?php 
                        if ($row['service_availability'] == 'available') {
                            echo '<h5>';
                            echo '<span class="ti-shopping-cart mr-2"></span>'.$row['service_name'];
                            echo '</h5>';
                            echo '<span>P '.$row['service_cost'].'</span>';
                            echo '<span class="badge badge-success ml-2" style="color:white; font-size: 12px;">'.$row['service_availability'].'</span>';
                        }else {
                            echo '<h5>';
                            echo '<span class="ti-shopping-cart mr-2"></span>'.$row['service_name'];
                            echo '</h5>';
                            echo '<span>P '.$row['service_cost'].'</span>';
                            echo '<span class="badge badge-danger ml-2" style="color:white; font-size: 12px;">'.$row['service_availability'].'</span>';
                        }
                    ?>   
                </div>
            </div>
            <div class="card-footer">
                <a href="<?php echo web_root; ?>pages/admin/index.php?serviceid=<?php echo $row['service_id'];?> & page=update_service">
                    <button type="button" class="btn btn-primary btn-sm">
                        <span class="ti-write"></span>
                    </button>
                </a>
                <?php
                    echo '<a href="function/shop_function.php?serviceid='.$row['service_id'].' & function=delete">
                            <button type="button" class="btn btn-danger btn-sm">
                                <span class="ti-trash"></span>
                            </button>
                        </a>';
                ?>
                <?php
                    if ($row['service_availability'] == 'available') {
                        echo '<a href="function/shop_function.php?serviceid='.$row['service_id'].' & function=unlink">
                                <button type="button" class="btn btn-success btn-sm">
                                    <span class="ti-link"></span>
                                </button>
                            </a>';
                    } else {
                        echo '<a href="function/shop_function.php?serviceid='.$row['service_id'].' & function=link">
                                <button type="button" class="btn btn-warning btn-sm">
                                    <span class="ti-unlink"></span>
                                </button>
                            </a>';
                    }
                ?>
                <span class="float-right text-muted"><?php echo $row['service_completion'] ." day/s" ?></span>
            </div>
        </div>
        <?php 
            }
        ?>
    </div>
