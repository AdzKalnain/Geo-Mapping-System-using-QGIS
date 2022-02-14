            <!-- Insert New Record via MAP-->
            <div class="container-fluid">
                <div class="card shadow">
                <?php
                    $graveno = $_GET['graveno'];
                    $stat = $_GET['stat'];
                    $grave_count = 0;
                    $check_number = mysqli_query($mysqli, "SELECT * FROM grave_record WHERE grave_id = '$graveno'");
                    while ($number_row = mysqli_fetch_array($check_number)) {
                        $grave_count = $grave_count+1;
                    }
                    if ($stat == 'vacant') {
                ?>
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Record Form <span class="text-danger"></span></p>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form class="record-form" action="function/function.php?action=add" method="POST">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="deceased-firstname" class="form-label label mt-3">First Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control"  name="deceased-firstname" value="" required>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label for="deceased-middlename" class="form-label label mt-3">Middle Name (Optional)</label>
                                        <input type="text" class="form-control" name="deceased-middlename" value="">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label for="deceased-lastname" class="form-label label mt-3">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="deceased-lastname" value="" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-birthday" class="form-label label mt-3">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="deceased-birthday" value="" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-deathday" class="form-label label mt-3">Date of Death <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="deceased-deathday" value="" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-gender" class="form-label label mt-3">Gender <span class="text-danger">*</span></label>
                                        <select name="deceased-gender" class="form-control" required>
                                            <option hidden>--Select an option--</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-agegroup" class="form-label label mt-3">Age group <span class="text-danger">*</span></label>
                                        <select name="deceased-agegroup" class="form-control" required>
                                            <option hidden>--Select an option--</option>
                                            <option value="Babies">Babies</option>
                                            <option value="Children">Children</option>
                                            <option value="Young Adults">Young Adults</option>
                                            <option value="Middle-aged Adults">Middle-aged Adults</option>
                                            <option value="Old Adults">Old Adults</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-contactname" class="form-label label mt-3">Contact Person <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="deceased-contactname" value="" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-contactno" class="form-label label mt-3">Contact No.</label>
                                        <input type="number" class="form-control" name="deceased-contactno" value="">      
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <label for="deceased-contactemail" class="form-label label mt-3">Email</label>
                                        <input type="email" class="form-control" name="deceased-contactemail" value="">        
                                    </div>
                                    <div class="col-12">
                                        <label for="grave-no" class="form-label label mt-2">Grave No. <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="grave-no" placeholder="<?php echo $graveno; ?>" value="<?php echo $graveno; ?>" readonly>   
                                    </div>
                                </div>
                                <button class="btn btn-submit btn-secondary btn-sm mt-2 float-right" name="btn-submit" value="Submit">Save</button>                     
                            </form>
                        </div>
                    </div>

                <?php 
                    }elseif($stat == 'occupied' OR 'occupied2') {

                        $query = mysqli_query($mysqli, "SELECT MAX(record_death) as max FROM grave_record WHERE grave_id = $graveno");
                        while ($row = mysqli_fetch_array($query)){
                            $decomposedate = date_create($row['max']);
                            $currentdate = date_create(@date('Y-m-d H:i:s'));
                            $difference = date_diff($decomposedate, $currentdate)->format('%y year/s and %m month/s');
                            if ($grave_count <= 2) {
                                if ($difference >= 8) {
                ?>
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 font-weight-bold">Record Form</p>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="record-form" action="function/function.php?count=<?php echo $grave_count;?> & action=add" method="POST">
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-12">
                                                        <label for="deceased-firstname" class="form-label label mt-3">First Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control"  name="deceased-firstname" value="" required>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <label for="deceased-middlename" class="form-label label mt-3">Middle Name (Optional)</label>
                                                        <input type="text" class="form-control" name="deceased-middlename" value="">
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <label for="deceased-lastname" class="form-label label mt-3">Last Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="deceased-lastname" value="" required>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="deceased-birthday" class="form-label label mt-3">Date of Birth <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" name="deceased-birthday" value="" required>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="deceased-deathday" class="form-label label mt-3">Date of Death <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" name="deceased-deathday" value="" required>        
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="deceased-gender" class="form-label label mt-3">Gender <span class="text-danger">*</span></label>
                                                        <select name="deceased-gender" class="form-control" required>
                                                            <option hidden>--Select an option--</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="deceased-agegroup" class="form-label label mt-3">Age group <span class="text-danger">*</span></label>
                                                        <select name="deceased-agegroup" class="form-control" required>
                                                            <option hidden>--Select an option--</option>
                                                            <option value="Babies">Babies</option>
                                                            <option value="Children">Children</option>
                                                            <option value="Young Adults">Young Adults</option>
                                                            <option value="Middle-aged Adults">Middle-aged Adults</option>
                                                            <option value="Old Adults">Old Adults</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12">
                                                        <label for="deceased-contactname" class="form-label label mt-3">Contact Person <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="deceased-contactname" value="" required>        
                                                    </div>
                                                        <div class="col-md-6 col-sm-12">
                                                        <label for="deceased-contactno" class="form-label label mt-3">Contact No.</label>
                                                        <input type="number" class="form-control" name="deceased-contactno" value="">      
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <label for="deceased-contactemail" class="form-label label mt-3">Email</label>
                                                        <input type="email" class="form-control" name="deceased-contactemail" value="">        
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="grave-no" class="form-label label mt-2">Grave No. <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="grave-no" placeholder="<?php echo $graveno; ?>" value="<?php echo $graveno; ?>" readonly>  
                                                    </div>
                                                </div>
                                            
                                                <button class="btn btn-submit btn-secondary mt-2 float-right" name="btn-submit" value="Submit">Save</button>      
                                    
                                            </form>
                                        </div>
                                    </div>
                <?php
                                } else {

                                    echo '<div class="card-header py-3">';
                                    echo '<p class="text-primary m-0 font-weight-bold text-center"><span class="text-danger">Plot isnt availble for merging</span></p>';
                                    echo '</div>';
                                        echo '<div class="card">';
                                            echo '<div class="card-body">';
                                                echo '<p class="text-center">The deceased recently buried was '.$difference.' ago, it should be 8 years and above</p>';
                                            echo '</div>';
                                    echo '</div>';     
               
                                }
                            } else {
                
                                echo '<div class="card-header py-3">';
                                    echo '<p class="text-primary m-0 font-weight-bold text-center"><span class="text-danger">Plot isnt availble for merging</span></p>';
                                echo '</div>';
                                echo '<div class="card">';
                                    echo '<div class="card-body">';
                                        echo '<p class="text-center">The number of the deceased buried in this grave exceeded the maximum allowed for merging</p>';
                                    echo '</div>';
                                echo '</div>';
                            }
                        }
                    } else {
                        echo '<div class="card-header py-3">';
                            echo '<p class="text-primary m-0 font-weight-bold text-center"><span class="text-danger">ERROR</span></p>';
                        echo '</div>';
                        echo '<div class="card">';
                            echo '<div class="card-body">';
                                echo '<p class="text-center">Something went wrong please try again later.</p>';
                            echo '</div>';
                        echo '</div>';
                    }
                ?>
                    
                </div>
            </div>