                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Order Info
                                    <a href="<?php echo web_root; ?>pages/admin/index.php?page=select_order">
                                        <button class="btn btn-secondary btn-sm float-right"><i class="fas fa-plus"></i><span> Create an order</span></button>
                                    </a>
                                </p>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-pills nav-pills-secondary justify-content-center nav-fill" id="order-tab" role="tablist">
                                <li class="nav-item">
                                    <a href="#default" class="nav-link active" id="default-tab" data-toggle="tab" role="tab" aria-controls="default" aria-selected="false">New Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#active" class="nav-link" id="active-tab" data-toggle="tab" role="tab" aria-controls="active" aria-selected="false">Active Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#history" class="nav-link" id="history-tab" data-toggle="tab" role="tab" aria-controls="history" aria-selected="false">Orders History</a>
                                </li>
                            </ul>

                            <div class="tab-content" id="orderTabContent">
                                <div class="tab-pane fade show active" id="default" role="tabpanel" aria-labelledby="default-tab">
                                    <?php require_once 'tabs/new_order.php'; ?>
                                </div>
                                <div class="tab-pane fade" id="active" role="tabpanel" aria-labelledby="active-tab">
                                    <?php require_once 'tabs/active_order.php'; ?>
                                </div>
                                <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                                    <?php require_once 'tabs/order_history.php'; ?>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            