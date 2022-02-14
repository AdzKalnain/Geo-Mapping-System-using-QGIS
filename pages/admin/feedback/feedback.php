            <div class="card-header py-3">
                <div class="feedback-dropdown d-flex justify-content-between">
                    <p class="text-secondary m-0 font-weight-bold">Feedback Info (New)</p>
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
                        $query = mysqli_query($mysqli, "SELECT * FROM grave_feedback WHERE feedback_status = 'New'"); 
                        if (mysqli_num_rows($query) > 0 ) {
                            while ($row = mysqli_fetch_array($query)) {
                    ?>
                    <div class="card-single shadow mt-3">
                        <div class="card-body">
                            <div>
                                    <?php 
                                        echo '<div class="d-flex justify-content-between pb-1">
                                        <h5 class="sender_name"><i class="far fa-comment-alt text-secondary mr-2"></i>'.$row['feedback_subject'].'</h5>
                                        <h5 class="sender_name text-muted">By: '.$row['feedback_sender'].'</h5>
                                        </div>';
                                        echo '<p class="sender_comment">'.$row['feedback_content'].'</p>';
                                    ?>   
                                <h4></h4>
                            </div>
                        </div>
                        <div class="card-footer pb-4">
                            <span class="text-muted"><?php echo $row['feedback_date']?></span>
                            <a href="<?php echo web_root; ?>pages/admin/function/feedback_function.php?feedbackid=<?php echo $row['feedback_id']; ?> & action=archive " class="float-right my-1">
                                <button type="button" class="btn btn-danger btn-sm ml-1">
                                    <span class="ti-close"></span>
                                </button>
                            </a>
                            <a href="<?php echo web_root; ?>pages/admin/function/feedback_function.php?feedbackid=<?php echo $row['feedback_id']; ?> & action=favorite" class="float-right my-1">
                                <button type="button" class="btn btn-info btn-sm">
                                    <span class="ti-heart"></span>
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
