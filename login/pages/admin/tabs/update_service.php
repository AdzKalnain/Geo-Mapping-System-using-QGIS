                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Update Service</p>
                        </div>
                        <div class="card-body">
                            <h2>Service Form</h2>
                            <p class="service-caption text-muted mt-1">Add new services that will rack you with customers</p>
                            <form class="service-form" action="function/shop_function.php?serviceid=<?php echo $_GET['serviceid'];?> & function=update" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="service-tname" class="form-label label mt-3">Service Name</label>
                                        <input type="text" class="form-control"  name="service-name" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="service-fee" class="form-label label mt-3">Service Fees <span class="text-muted">(in php)</span></label>
                                        <input type="number" class="form-control" name="service-fee" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="service-duration" class="form-label label mt-3">Working duration</label>
                                        <input type="number" class="form-control" name="service-duration" value="">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="service-status" class="form-label label mt-3">Starting status</label>
                                        <select name="service-status" id="service-status" class="form-control">
                                            <option value="available">Available</option>
                                            <option value="not available">Unavailable</option>
                                        </select>        
                                    </div>
                                </div> 
                                <button class="btn btn-secondary btn-submit mt-3 float-right" name="btn-submit" value="Submit">Save</button>               
                            </form>
                        </div>
                    </div>
                </div>
            