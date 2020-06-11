<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Institution */

$this->title = 'School ERP : Institution';
$this->params['breadcrumbs'][] = ['label' => 'Institutions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->institution_id, 'url' => ['view', 'id' => $model->institution_id]];
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
                <a href="<?php echo Url::to(['institution/create']); ?>"
                    class="breadcrumb-item"><?=Yii::t('app', 'Settings');?></a>
                <span class="breadcrumb-item active"><?=Yii::t('app', 'Institution Details');?></span>
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
                    <div class="card-header header-elements-sm-inline">
                        <h6 class="card-title"><?=Yii::t('app', 'Institution Details');?></h6>
                        <div class="header-elements">
                            <!-- <span><i class="icon-history mr-2 text-success"></i> Updated 3 hours ago</span> -->
                            <div class="list-icons ml-3">
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <div class="chart" id="tornado_negative_stack">
                                <!-- 2 columns form -->
                                <div class="card">
                                    <div class="card-body">
                                        <?=$this->render('_form', [
								'model' => $model,'country' => $country,'currency' => $currency
								])?>
                                    </div>
                                </div>
                                <!-- /2 columns form -->
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
                           <?php if (isset($model->institution_logo)) { 
                              $logo =  Yii::$app->request->baseUrl . '/frontend/web/uploads/institution/' . $model->institution_logo;

                              }else{
                                 $logo = Yii::$app->request->baseUrl . '/frontend/web/uploads/institution/default_logo.png';
                              }?>
                            <img class="img-fluid rounded-circle"
                                src="<?= $logo?>" width="170"
                           
                                height="170" alt="">
                            <!-- <div class="card-img-actions-overlay card-img rounded-circle">
                                <a href="#"
                                    class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                    <i class="icon-plus3"></i>
                                </a>
                                <a href="user_pages_profile.html"
                                    class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                                    <i class="icon-link"></i>
                                </a>
                            </div> -->
                        </div>
                        <h6 class="font-weight-semibold mb-0"><?= $model->institution_name ?></h6>
                        <span class="d-block text-muted"><?= $model->institution_contactemail ?></span>
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
            </div>
            <!-- /sidebar content -->
        </div>
        <!-- /right sidebar component -->
    </div>
    <!-- /inner container -->
</div>