                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                    </div>
                    
                    <div class="row">

                        <div class="col-lg-8 col-xl-9">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-secondary font-weight-bold m-0">Cemetery Plot</h6>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div id="map" style="border: 1px solid black; width: 99%; height: 400px;">
                                        <div id="loading">
                                            <img id="loading-image" class="mx-auto" src="<?php echo web_root; ?>assets/img/Preloader_3.gif" alt="Loading..." />
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-xl-3">
                            <div class="row">
                                <div class="col-md-6 col-lg-12 mb-4">
                                    <!-- style="background-color: #008E76;" -->
                                    <div class="card text-white bg-secondary shadow">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col">
                                                <div class="card-body">
                                                        <?php
                                                            $sql = mysqli_query($mysqli, "SELECT * FROM grave_data WHERE status = 'occupied1' OR status = 'occupied2' OR status = 'occupied3'");
                                                            $row = mysqli_num_rows($sql);
                                                            $occupied_count = 0;
                                                            for ($result = 0; $row > $result; $result++) {
                                                                $occupied_count = $occupied_count + 1;
                                                            }
                                                        ?>
                                                    <p class="m-0"><?php echo $occupied_count; ?></p>
                                                    <p class="text-white-50 small m-0">Occupied Plot</p>
                                                </div>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-clipboard-check fa-2x mr-4"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 mb-4">
                                    <!-- style="background-color: #17B88F;" -->
                                    <div class="card text-white bg-secondary shadow">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col">
                                                <div class="card-body">
                                                        <?php
                                                            $sql_vacant = mysqli_query($mysqli, "SELECT COUNT(grave_no) as max_grave FROM grave_data WHERE status = 'vacant'");
                                                            // $sql_vacant = mysqli_query($mysqli, "SELECT * FROM grave_data WHERE status = 'vacant'");
                                                            // $vacant = mysqli_num_rows($sql_vacant);
                                                            $vacant = mysqli_fetch_array($sql_vacant);
                                                            $vacant_count = $vacant['max_grave'];
                                                            
                                                            // $vacant_count = 0;
                                                            // for ($vacant_result = 0; $vacant > $vacant_result; $vacant_result++) {
                                                            //     $vacant_count = $vacant_count + 1;
                                                            // }
                                                        ?>
                                                    <p class="m-0"><?php echo $vacant_count; ?></p>
                                                    <p class="text-white-50 small m-0">Vacant Plot</p>
                                                </div>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-clipboard fa-2x mr-4"></i></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 mb-4">
                                    <!-- style="background-color: #53CC9D;" -->
                                    <div class="card text-white bg-secondary shadow">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col">
                                                    <?php
                                                        $order_sql = mysqli_query($mysqli, "SELECT * FROM grave_orders WHERE order_status = 'Completed'");
                                                        $order = mysqli_num_rows($order_sql);
                                                        $order_count = 0;
                                                        for ($order_result = 0; $order > $order_result; $order_result++) {
                                                            $order_count = $order_count + 1;
                                                        }
                                                    ?>
                                                    <p class="m-0"><?php echo $order_count; ?></p>
                                                    <p class="text-white-50 small m-0">Order completed</p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-dolly-flatbed fa-2x mr-1"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 mb-4">
                                    <!-- style="background-color: #3695E7;" -->
                                    <div class="card text-white bg-secondary shadow">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col">
                                                    <?php
                                                        $order_pending_sql = mysqli_query($mysqli, "SELECT * FROM grave_orders WHERE order_status = 'Pending'");
                                                        $order_pending = mysqli_num_rows($order_pending_sql);
                                                        $order_pending_count = 0;
                                                        for ($order_pending_result = 0; $order_pending > $order_pending_result; $order_pending_result++) {
                                                            $order_pending_count = $order_pending_count + 1;
                                                        }
                                                    ?>
                                                    <p class="m-0"><?php echo $order_pending_count; ?></p>
                                                    <p class="text-white-50 small m-0">Pending order</p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-dolly fa-2x mr-1"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>