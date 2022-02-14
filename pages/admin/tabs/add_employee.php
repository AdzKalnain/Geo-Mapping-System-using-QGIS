<div class="container-fluid">
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">New Employee</p>
            </div>
            <div class="card-body">
                <h2>Recruit Form</h2>
                <form class="service-form" action="function/order_function.php?function=emp" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="emp-fname" class="form-label label mt-3">First Name</label>
                            <input type="text" class="form-control"  name="emp-fname" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="emp-lname" class="form-label label mt-3">Last Name</label>
                            <input type="text" class="form-control"  name="emp-lname" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="emp-gender" class="form-label label mt-3">Gender</label>
                            <select name="emp-gender" id="emp-gender" class="form-control" required>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="emp-contact" class="form-label label mt-3">Contact No.</label>
                            <input type="number" class="form-control" name="emp-contact" value="" onkeypress="return (event.charCode !=8 && event.charCode == 0 || (event.charCode >= 48 && event.charCode <=57))" required>
                        </div>
                        <div class="col-md-6">
                            <label for="emp-address" class="form-label label mt-3">Address</label>
                            <input type="text" class="form-control" name="emp-address" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="emp-status" class="form-label label mt-3">Starting status</label>
                            <select name="emp-status" id="emp-status" class="form-control" required>
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
