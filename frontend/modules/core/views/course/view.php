<?php

use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Course */

$this->title = $model->course_name;
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<div class="content">

    <!-- Breacrumb component -->
    <div
        class="breadcrumb-line breadcrumb-line-light bg-white breadcrumb-line-component header-elements-md-inline mb-4">
        <div class="d-flex">
            <div class="breadcrumb">

                <a href="<?= Yii::$app->request->baseUrl; ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                    <?=Yii::t('app', 'Home');?></a>
                <a href="" class="breadcrumb-item"><?=Yii::t('app', 'Academic');?></a>
                <a href="<?php echo Url::to(['course/create']); ?>" class="breadcrumb-item"><?=Yii::t('app', 'Course & Batch');?></a>
                <span class="breadcrumb-item active"><?=Yii::t('app', 'Course');?></span>
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
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"><?=Yii::t('app', 'Course Details');?></h5>
            <div class="header-elements">
                <div class="list-icons">
                    <!-- <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <a class="list-icons-item" data-action="remove"></a> -->
                </div>
            </div>
        </div>
        <div class="card-body">
            

            <div class="card card-table table-responsive shadow-0 mb-0">
                <?= DetailView::widget([
                    'model' => $model,
                    'options' => ['class' => 'table table-bordered'],
                    'attributes' => [
                        'courseid',
                        'course_name',
                        'course_description',
                        'course_code',
                        'minimumattendance',
                        'attendancetype',
                        'totalworkingdays',
                    ],
                ]) ?>
            </div>
        </div>

    </div>

</div>