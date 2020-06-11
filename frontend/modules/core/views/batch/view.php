<?php

use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;
use yii\helpers\Url;


/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Batch */

$this->title = $model->batch_name;
$this->params['breadcrumbs'][] = ['label' => 'Batches', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="content">

    <!-- Breacrumb component -->
    <div
        class="breadcrumb-line breadcrumb-line-light bg-white breadcrumb-line-component header-elements-md-inline mb-4">
        <div class="d-flex">
            <div class="breadcrumb">

                <a href="<?=Yii::$app->request->baseUrl;?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                    <?=Yii::t('app', 'Home');?></a>
                <a href="" class="breadcrumb-item"><?=Yii::t('app', 'Academic');?></a>
                <a href="<?php echo Url::to(['batch/create']); ?>" class="breadcrumb-item"><?=Yii::t('app', 'Course & Batch');?></a>
                <span class="breadcrumb-item active"><?=Yii::t('app', 'Batch');?></span>
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
            <h5 class="card-title"><?=Yii::t('app', 'Batch Details');?></h5>
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
                <?=DetailView::widget([
                    'model' => $model,
                    'options' => ['class' => 'table table-bordered'],
                    'attributes' => [
                        'batchid',
                      //  'institutionid',
                       // 'courseid',
                        [
                            'attribute' => 'courseid',
                            'value' => isset($model->courseid) ? $model->course->course_name : '',
                        ],
                        'batch_name',
                        'batch_startdate',
                        'batch_enddate',
                        'max_no_of_students',
                     //   'venue',
                    ],
                ])?>
            </div>
        </div>

    </div>

</div>

