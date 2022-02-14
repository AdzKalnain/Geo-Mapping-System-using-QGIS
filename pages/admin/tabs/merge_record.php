            <!-- Merge New Record-->
            <div class="container-fluid">
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Record Form</p>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form class="record-form" action="function/function.php?action=add" method="POST">
                                <div class="row">
                                    <div class="col-md-4 col-sm-12">
                                        <label for="deceased-firstname" class="form-label label mt-3">First Name</label>
                                        <input type="text" class="form-control"  name="deceased-firstname" value="" required>
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label for="deceased-middlename" class="form-label label mt-3">Middle Name (Optional)</label>
                                        <input type="text" class="form-control" name="deceased-middlename" value="">
                                    </div>
                                    <div class="col-md-4 col-sm-12">
                                        <label for="deceased-lastname" class="form-label label mt-3">Last Name</label>
                                        <input type="text" class="form-control" name="deceased-lastname" value="" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-birthday" class="form-label label mt-3">Date of Birth</label>
                                        <input type="date" class="form-control" name="deceased-birthday" value="" required>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-deathday" class="form-label label mt-3">Date of Death</label>
                                        <input type="date" class="form-control" name="deceased-deathday" value="" required>        
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-gender" class="form-label label mt-3">Gender</label>
                                        <select name="deceased-gender" class="form-control" required>
                                            <option hidden>--Select an option--</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>        
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-agegroup" class="form-label label mt-3">Age group</label>
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
                                        <label for="deceased-contactname" class="form-label label mt-3">Contact Person</label>
                                        <input type="text" class="form-control" name="deceased-contactname" value="" required>        
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="deceased-contactno" class="form-label label mt-3">Contact No.</label>
                                        <input type="number" class="form-control" name="deceased-contactno" value="" required>        
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <label for="deceased-contactemail" class="form-label label mt-3">Email</label>
                                        <input type="email" class="form-control" name="deceased-contactemail" value="" required>        
                                    </div>
                                    <div class="col-12">
                                        <label for="grave-no" class="form-label label mt-2">Grave No.</label>
                                        <select name="grave-no" id="graveno" class="form-control" required>
                                            <option value="none">Select a grave no</option>
                                            <?php
                                                $result = mysqli_query($mysqli, "SELECT MAX(record_death) as max FROM grave_record");
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $death_date = date_create($row['max']);
                                                    $current_date = date_create(@date('Y-m-d H:i:s'));
                                                    $difference = date_diff($death_date, $current_date)->format('%y');
                                                    if($difference >=8) {
                                                        echo  '<option value='.$row['grave_id'].'>'.$row['grave_id'].'</option>';
                                                    }
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