<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Employee */

$this->title = 'Update Employee: ' . $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employee_id, 'url' => ['view', 'id' => $model->employee_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content">

    <!-- Breacrumb component -->
    <div
        class="breadcrumb-line breadcrumb-line-light bg-white breadcrumb-line-component header-elements-md-inline mb-4">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="<?=Yii::$app->request->baseUrl;?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                    <?=Yii::t('app', 'Home');?></a>
                <a href="" class="breadcrumb-item"><?=Yii::t('app', 'HR/Payroll');?></a>
                <a href="" class="breadcrumb-item"><?=Yii::t('app', 'Employee Management');?></a>
                <a href="<?php echo Url::to(['employee/index']); ?>"
                    class="breadcrumb-item"><?=Yii::t('app', 'Employee');?></a>
                <span class="breadcrumb-item active"><?=Yii::t('app', 'Edit Employee');?></span>
            </div>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item">
                    <i class="icon-comment-discussion mr-2"></i>
                    <?=Yii::t('app', 'Support');?>
                </a>
            </div>
        </div>
    </div>
    <!-- /breacrumb component -->
    <!-- Inner container -->
    <div class="d-flex align-items-start flex-column flex-md-row">
        <!-- Left content -->
        <div class="tab-content w-100 order-2 order-md-1">
            <div class="" id="activity">
                <div class="col-md-12">

                    <!-- Basic legend -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">
                                <?=Yii::t('app', 'Update Employee Details');?>
                            </h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <!-- <a class="list-icons-item" data-action="collapse"></a> -->
                                    <!-- <a class="list-icons-item" data-action="reload"></a> -->
                                    <!-- <a class="list-icons-item" data-action="remove"></a> -->
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <?=$this->render('_form', [
                    'model' => $model,'employee_detail' => $employee_detail,'gender' =>$gender,'department' => $department,'designation' => $designation,'usertype' => $usertype
                ])?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /basic legend -->

                </div>
            </div>
        </div>
        <!-- /left content -->
        <!-- Right sidebar component -->
        <div
            class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right wmin-300 border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">
            <!-- Sidebar content -->
            <div class="sidebar-content">
                <!-- User card -->
                <div class="card">
                    <div class="card-body text-center">
                        <div class="card-img-actions d-inline-block mb-3">
                            <?php if (isset($employee_detail->employeedetails_photo)) { 
                             
                              $logo =  Yii::$app->request->baseUrl . '/frontend/web/uploads/employee/' . $model->employee_firstname . '-' . $model->employee_code . '/' . $employee_detail->employeedetails_photo;
                         
                              }else{
                                 $logo = Yii::$app->request->baseUrl . '/frontend/web/images/default_user.jpg';
                              }?>
                            <img class="img-fluid rounded-circle" src="<?= $logo?>" width="170" height="170" alt="">

                        </div>
                        <h6 class="font-weight-semibold mb-0"><?= $model->employee_firstname ?></h6>
                        <span class="d-block text-muted"><?= $employee_detail->employeedetails_email ?></span>
                        <div class="list-icons list-icons-extended mt-3">
                            <a href="#" class="list-icons-item" data-popup="tooltip" title="Google Drive"
                                data-container="body"><i class="icon-google-drive"></i></a>
                            <a href="#" class="list-icons-item" data-popup="tooltip" title="Twitter"
                                data-container="body"><i class="icon-twitter"></i></a>
                            <a href="#" class="list-icons-item" data-popup="tooltip" title="Github"
                                data-container="body"><i class="icon-github"></i></a>
                        </div>
                    </div>

                </div>


                <!-- /user card -->

                <ul class="list-group">
                    <li class="list-group-item font-weight-semibold">
                        <h6 class="panel-title">Navigation</h6>
                    </li>
                    <li class="list-group-item"><i class="icon-cash3"></i>Salary Details</li>
                    <li class="list-group-item"><i class="icon-user"></i>Leave Approvals</li>
                    <li class="list-group-item"><i class="icon-calendar3"></i>View Time Table</li>
                </ul>
            </div>
            <!-- /sidebar content -->
        </div>
        <!-- /right sidebar component -->
    </div>
    <!-- /inner container -->
</div>