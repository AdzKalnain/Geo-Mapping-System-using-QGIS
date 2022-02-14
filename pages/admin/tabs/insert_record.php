            <!-- Insert New Record-->
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Record Form</p>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <?php $count = 0; ?>
                            <form class="record-form" action="function/function.php?count=<?php echo $count;?>& action=add" method="POST">
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
                                        <select name="grave-no" id="graveno" class="form-control" required>
                                            <option value="" hidden>Select a grave no</option>
                                            <?php
                                                $result = mysqli_query($mysqli, "SELECT * FROM grave_data WHERE status = 'vacant'");
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo  '<option value='.$row['grave_no'].'>'.$row['grave_no'].'</option>';
                                                }
                                            ?>
                                        </select>
                                        <p class="grave-caption text-muted"><small>Refer to the map for the grave no.</small></p>   
                                    </div>
                                </div> 
                                
                                <button class="btn btn-submit btn-secondary mt-2 float-right" name="btn-submit" value="Submit">Save</button>               
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>