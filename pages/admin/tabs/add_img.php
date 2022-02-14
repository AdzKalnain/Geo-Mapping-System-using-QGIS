<?php
    $graveid = $_GET['graveid'];
?>
<div class="container-fluid">
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">Add Images</p>
            </div>
            <div class="card-body">
                <form class="service-form" action="function/function.php?graveid=<?php echo $graveid; ?>&action=img" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="grave-img" class="form-label label mt-3">Image</label>
                            <input type="file" step="any" class="form-control"  name="grave-img" value="">
                        </div>
                    </div> 
                    <button class="btn btn-secondary btn-submit mt-3 float-right" name="btn-save" value="Submit">Save</button>               
                </form>
            </div>
        </div>
    </div>
