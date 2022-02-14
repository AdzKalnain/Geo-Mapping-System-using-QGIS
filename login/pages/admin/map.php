            <!-- Map-->
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <h4 class="text-dark mb-4">Cemetery Map</h4>
                    <div class="row pl-3 text-sm mb-3">
                        <h6>Legend:</h6>
                        <div class="col-sm-12 d-flex flex-column">
                            <span><i class="fa fa-square text-vacant"></i> Vacant</span>
                            <span><i class="fa fa-square text-occupied1"></i> Occupied by 1 person</span>
                            <span><i class="fa fa-square text-occupied2"></i> Occupied by 2 person</span>
                            <span><i class="fa fa-square text-occupied3"></i> Occupied by 3 person</span>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div>
                            <div id="map" style="border: 1px solid black; width: 99%; height: 420px;">
                            <div id="loading">
                                <img id="loading-image" class="mx-auto" src="<?php echo web_root; ?>assets/img/Preloader_3.gif" alt="Loading..." />
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>