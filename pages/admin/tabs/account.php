<div class="container-fluid">
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">New Account</p>
            </div>
            <div class="card-body">
                <h2>Registration Form</h2>
                <form class="service-form" action="function/order_function.php?function=account" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="acc-fname" class="form-label label mt-3">First Name</label>
                            <input type="text" class="form-control"  name="acc-fname" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="acc-lname" class="form-label label mt-3">Last Name</label>
                            <input type="text" class="form-control"  name="acc-lname" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="acc-email" class="form-label label mt-3">Email</label>
                            <input type="email" class="form-control"  name="acc-email" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="acc-pass" class="form-label label mt-3">Password</label>
                            <input type="password" class="form-control"  name="acc-pass" value="" required>
                        </div>
                        <div class="col-md-12">
                            <label for="acc-role" class="form-label label mt-3">Role</label>
                            <select name="acc-role" id="acc-role" class="form-control" required>
                                <option value="clerk">Sub / Clerk</option>
                            </select>        
                        </div>
                    </div> 
                    <!-- <input type="button" class="btn btn-outline-secondary mt-3 float-right ml-2" name="btn-modal" value="View all the account"> -->
                    <button class="btn btn-secondary btn-submit mt-3 float-right" name="btn-submit" value="Submit">Create</button>               
                </form>
                    <input type="button" class="btn btn-outline-secondary mt-3 float-right mr-2" name="btn-modal" value="View all the account" data-toggle="modal" data-target="#accountModal">
                    <div class="modal fade" id="accountModal" tabindex="-1" role="dialog" aria-labelledby="accountModalTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="accountModalTitle">Account List</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <?php 
                                            $result = mysqli_query($mysqli, "SELECT * FROM grave_user WHERE user_type = 'clerk'");
                                        ?>
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Joined</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo '<tr>';
                                                    echo '<td>'.$row['user_name'].'</td>';
                                                    echo '<td>'.$row['user_email'].'</td>';
                                                    echo '<td>'.$row['user_type'].'</td>';
                                                    echo '<td>'.$row['creation_date'].'</td>';
                                                    echo '</tr>';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
