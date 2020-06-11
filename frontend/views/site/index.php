<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'School ERP';
?>
<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <!-- <div class="header-elements d-none text-center text-md-left mb-3 mb-md-0">
                        <div class="btn-group">
                            <button type="button" class="btn bg-indigo-400"><i class="icon-stack2 mr-2"></i> New report</button>
                            <button type="button" class="btn bg-indigo-400 dropdown-toggle" data-toggle="dropdown"></button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header">Actions</div>
                                <a href="#" class="dropdown-item"><i class="icon-file-eye"></i> View reports</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit reports</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-stats"></i> Statistics</a>
                                <div class="dropdown-header">Export</div>
                                <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to PDF</a>
                                <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Export to CSV</a>
                            </div>
                        </div>
                    </div> -->
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content pt-0">


    <!-- Main charts -->
    <div class="row">
        <div class="col-xl-12">

            <!-- Traffic sources -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Traffic sources</h6>
                    <div class="header-elements">
                        <div class="form-check form-check-right form-check-switchery form-check-switchery-sm">
                            <label class="form-check-label">
                                Live update:
                                <input type="checkbox" class="form-input-switchery" checked data-fouc>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="card-body py-0">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <a href="#"
                                    class="btn bg-transparent border-teal text-teal rounded-round border-2 btn-icon mr-3">
                                    <i class="icon-plus3"></i>
                                </a>
                                <div>
                                    <div class="font-weight-semibold">New visitors</div>
                                    <span class="text-muted">2,349 avg</span>
                                </div>
                            </div>
                            <div class="w-75 mx-auto mb-3" id="new-visitors"></div>
                        </div>

                        <div class="col-sm-4">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <a href="#"
                                    class="btn bg-transparent border-warning-400 text-warning-400 rounded-round border-2 btn-icon mr-3">
                                    <i class="icon-watch2"></i>
                                </a>
                                <div>
                                    <div class="font-weight-semibold">New sessions</div>
                                    <span class="text-muted">08:20 avg</span>
                                </div>
                            </div>
                            <div class="w-75 mx-auto mb-3" id="new-sessions"></div>
                        </div>

                        <div class="col-sm-4">
                            <div class="d-flex align-items-center justify-content-center mb-2">
                                <a href="#"
                                    class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon mr-3">
                                    <i class="icon-people"></i>
                                </a>
                                <div>
                                    <div class="font-weight-semibold">Total online</div>
                                    <span class="text-muted"><span class="badge badge-mark border-success mr-2"></span>
                                        5,378 avg</span>
                                </div>
                            </div>
                            <div class="w-75 mx-auto mb-3" id="total-online"></div>
                        </div>
                    </div>
                </div>

                <div class="chart position-relative" id="traffic-sources"></div>
            </div>
            <!-- /traffic sources -->

        </div>


    </div>
    <!-- /main charts -->




</div>
<!-- /content area -->