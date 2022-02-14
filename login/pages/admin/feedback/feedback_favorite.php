            <div class="card-header py-3">
                <div class="feedback-dropdown d-flex justify-content-between">
                    <p class="text-secondary m-0 font-weight-bold">Feedback Info (Favorite)</p>
                    <button class="btn btn-secondary btn-sm dropdown-toggle mr-2" type="button" id="dropdownRequestButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="ti-menu-alt"></span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownRequestButton">
                        <a class="dropdown-item" href="<?php web_root; ?>index.php?page=feedback">New</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php web_root; ?>index.php?page=feedback_favorite">Favorite</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php web_root; ?>index.php?page=feedback_archive">Archive</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="dash-feedback-cards">
                    <?php 
                        $count = 0;
                        $query = mysqli_query($mysqli, "SELECT * FROM grave_feedback WHERE feedback_status = 'Favorite'"); 
                        if (mysqli_num_rows($query) > 0 ) {
                            while ($row = mysqli_fetch_array($query)) {
                            
                    ?>
                    <div class="card-single mt-3">
                        <div class="card-body">
                            <div>
                                    <?php 
                                        echo '<h5 class="sender_name"><i class="far fa-comment-alt text-secondary mr-2"></i>'.$row['feedback_sender'].'</h5>';
                                        echo '<p class="sender_comment">'.$row['feedback_content'].'</p>';
                                    ?>   
                                <h4></h4>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="text-muted"><?php echo $row['feedback_date']?></span>
                            <a href="<?php echo web_root; ?>pages/admin/function/feedback_function.php?feedbackid=<?php echo $row['feedback_id']; ?> & action=unfavorite" class="float-right my-1">
                                <button type="button" class="btn btn-warning btn-sm">
                                    <span class="ti-heart-broken"></span>
                                </button>
                            </a>
                        </div>
                    </div>
                    <?php 
                        }
                    } else {
                            echo '<div class="d-flex justify-content-center mt-5 pt-5 mb-5 pb-5">
                            <h4 class="text-muted align-self-center">Empty</h4>
                            </div>';
                    }
                    ?>
                </div>
            </div>
