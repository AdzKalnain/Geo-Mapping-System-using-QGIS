<div class="shop-cards mx-4">
    <?php 
        $query = mysqli_query($mysqli, "SELECT * FROM grave_services"); 
        while ($row = mysqli_fetch_array($query)) {
    ?>
        <div class="shop-single shadow mt-3">
            <?php 
                if ($row['service_availability'] == 'available') {
                    echo '<div class="card-body">';
                        echo '<h5>';
                            echo '<span class="ti-shopping-cart mr-2"></span>'.$row['service_name'];
                        echo '</h5>';
                        echo '<span>P '.$row['service_cost'].'</span>';
                        echo '<span class="badge badge-success ml-2" style="color:white; font-size: 12px;">'.$row['service_availability'].'</span>';
                    echo '</div>';
                    
                    echo '<div class="card-footer">';
                        echo '<a href="index.php?page=request&service_id='.$row['service_id'].'" class="float-left">';
                            echo '<button type="button" class="btn btn-primary btn-sm mb-2">';
                                echo '<span class="ti-shopping-cart"></span>';
                            echo '</button>';
                        echo '</a>';
                    echo '<span class="float-right text-muted">'.$row['service_completion'].' day/s</span>';
                    echo '</div>';
                } else {
                    echo '<div class="card-body">';
                        echo '<h5>';
                        echo '<span class="ti-shopping-cart mr-2"></span>'.$row['service_name'];
                        echo '</h5>';
                        echo '<span>P '.$row['service_cost'].'</span>';
                        echo '<span class="badge badge-danger ml-2" style="color:white; font-size: 12px;">'.$row['service_availability'].'</span>';
                    echo '</div>';

                    echo '<div class="card-footer">';
                        echo '<a href="#" class="float-left">';
                            echo '<button type="button" class="btn btn-primary btn-sm mb-2" disabled>';
                                echo '<span class="ti-shopping-cart"></span>';
                            echo '</button>';
                        echo '</a>';

                        echo '<span class="float-right text-muted">'.$row['service_completion'].' day/s</span>';
                    echo '</div>';
                }
            ?>
        </div>
    <?php 
        }
    ?>
</div>
