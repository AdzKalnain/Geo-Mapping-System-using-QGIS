<div class="container-fluid">
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 font-weight-bold">New Plot</p>
            </div>
            <div class="card-body">
                <form class="service-form" action="function/function.php?action=plot" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="plot-point" class="form-label label mt-3">Point</label>
                            <input type="number" step="any" class="form-control"  name="plot-point" value="" required>
                        </div>
                        <div class="col-md-6">
                            <label for="plot-coordinate" class="form-label label mt-3">Coordinate</label>
                            <input type="number" step="any" class="form-control" name="plot-coordinate" value="" required>
                        </div>
                    </div> 
                    <small><p>Point and Coordinate can be generated using QGIS</p></small>
                    <button class="btn btn-secondary btn-submit mt-3 float-right" name="btn-insert" value="Submit">Insert</button>               
                </form>
            </div>
        </div>
    </div>
