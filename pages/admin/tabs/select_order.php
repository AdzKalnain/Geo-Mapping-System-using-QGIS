<h4 class="mx-5">List of services</h4>
    <div class="shop-cards mx-5">
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
                <?php 
                    if ($row['service_availability'] == 'available') {
                ?>
                    <a href="<?php echo web_root; ?>pages/admin/index.php?service_id=<?php echo $row['service_id'];?> & page=add_order">
                        <button type="button" class="btn btn-primary btn-sm">
                            <span class="ti-shopping-cart"></span>
                        </button>
                    </a>
                <?php 
                    } else {
                ?>
                    <a href="#">
                        <button type="button" class="btn btn-primary btn-sm" disabled>
                            <span class="ti-shopping-cart"></span>
                        </button>
                    </a>
                <?php
                    }
                ?>
                <span class="float-right text-muted"><?php echo $row['service_completion'] ." day/s" ?></span>
            </div>
        </div>
        <?php 
            }
        ?>
    </div>
