<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Student */

$this->title = 'Update Student: ' . $model->student_first_name;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_id, 'url' => ['view', 'id' => $model->student_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content">
    <!-- Breacrumb component -->
    <div
        class="breadcrumb-line breadcrumb-line-light bg-white breadcrumb-line-component header-elements-md-inline mb-4">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="<?= Yii::$app->request->baseUrl; ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                    <?=Yii::t('app', 'Home');?></a>
                <a href="<?php echo Url::to(['student/index']); ?>" class="breadcrumb-item"><?=Yii::t('app', 'Student');?></a>
                <a href="<?php echo Url::to(['student/update','id' => $model->slug]); ?>" class="breadcrumb-item"><?=Yii::t('app', 'Update');?></a>
                <span class="breadcrumb-item active"><?=Yii::t('app', $model->student_first_name);?></span>
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
                <div class="card">

                    <div class="card-body">
                        <div class="chart-container">
                            <div class="chart" id="tornado_negative_stack">
                                <ul class="nav nav-tabs nav-tabs-highlight">
                                    <li class="nav-item">
                                        <a href="#profile-tab" class="nav-link active" data-toggle="tab"><i
                                                class="icon-user-tie"></i> <?=Yii::t('app', 'Profile');?></a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="#details-tab" class="nav-link" data-toggle="tab"><i
                                                class="icon-profile"></i><?=Yii::t('app', 'Details');?></a>
                                    </li>


                                </ul>



                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="profile-tab">
                                        <?=$this->render('_form', [
                                        'model' => $model, 'courses' => $courses, 'batch' => $batch, 'studentcategory' => $studentcategory, 'bloodgroup' => $bloodgroup, 'gender' => $gender,'caste' =>$caste,
                                        'religion' => $religion,'studenthouse' =>$studenthouse,'documenttype' =>$documenttype,'student_docAll' => $student_docAll, 'guardian' => $guardian, 
                                        'parent' => $parent, 'pq' => $pq,'healthdetails' => $healthdetails
                                        ])?>
                                    </div>

                                    <div class="tab-pane fade" id="details-tab">
                                        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin
                                        coffee squid
                                        laeggin.
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
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
                            <?php if (isset($model->student_photo)) { 
                             
                              $logo =  Yii::$app->request->baseUrl . '/frontend/web/uploads/students/' . $model->student_first_name . '-' . $model->student_admission_no . '/' . $model->student_photo;
                         
                              }else{
                                 $logo = Yii::$app->request->baseUrl . '/frontend/web/images/default_user.jpg';
                              }?>
                            <img class="img-fluid rounded-circle" src="<?= $logo?>" width="170" height="170" alt="">

                        </div>
                        <h6 class="font-weight-semibold mb-0"><?= $model->student_first_name ?></h6>
                        <span class="d-block text-muted"><?= $model->student_email ?></span>
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
                    <li class="list-group-item font-weight-semibold"><h6 class="panel-title">Navigation</h6></li>
                    <li class="list-group-item"><i class="icon-user"></i>  Attendance</li>
                    <li class="list-group-item"><i class="icon-calendar3"></i> Time Table</li>
                    <li class="list-group-item"><i class="icon-cash3"></i> Fee Collection</li>
                    <li class="list-group-item"><i class="icon-menu7"></i> Set Exam</li>
                </ul>
            </div>
            <!-- /sidebar content -->
        </div>
        <!-- /right sidebar component -->
    </div>
    <!-- /inner container -->
</div>