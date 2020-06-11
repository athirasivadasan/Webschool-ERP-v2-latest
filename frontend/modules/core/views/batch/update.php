<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Batch */

$this->title = 'Update Batch: ' . $model->batchid;
$this->params['breadcrumbs'][] = ['label' => 'Batches', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->batchid, 'url' => ['view', 'id' => $model->batchid]];
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
            <a href="" class="breadcrumb-item"><?=Yii::t('app', 'Academic');?></a>
            <a href="<?php echo Url::to(['batch/create']); ?>"
                class="breadcrumb-item"><?=Yii::t('app', 'Course & Batch');?></a>
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

<div class="row">
    <div class="col-md-6">

        <!-- Basic legend -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">
                Batch
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
                <?=$this->render('_form', [
'model' => $model,'courses' => $courses, 'dataProvider' => $dataProvider
])?>
            </div>
        </div>
        <!-- /basic legend -->

    </div>

    <div class="col-md-6">

        <!-- Advanced legend -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Batch Details</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <!-- <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a> -->
                    </div>
                </div>
            </div>

            <div class="card-body">


                <legend class="font-weight-semibold text-uppercase font-size-sm"></legend>

                <?=
                    GridView::widget([
                        'dataProvider' => $dataProvider,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'batchid',
                            'institutionid',
                            //'courseid',
                            [
                                'attribute' => 'courseid',
                                'value' => function($data) {
                                    return isset($data->courseid) ? $data->course->course_name : '';
                                },
                            ],
                            'batch_name',
                            'batch_startdate',
                            //'batch_enddate',
                            //'max_no_of_students',
                            //'venue',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Actions',
                                'headerOptions' => ['style' => 'color:#337ab7'],
                                'template' => '{view}{update}{delete}',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        return Html::a('<span class="icon-eye"></span>', $url, [
                                            'title' => Yii::t('app', 'view'),
                                        ]);
                                    },

                                    'update' => function ($url, $model) {
                                        return Html::a('<span class="icon-pencil"></span>', $url, [
                                            'title' => Yii::t('app', 'update'),
                                        ]);
                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::a('<span class="icon-cross2"></span>', $url, [
                                            'title' => Yii::t('app', 'delete'),
                                        ]);
                                    },

                                ],
                                'urlCreator' => function ($action, $model, $key, $index) {
                                    if ($action === 'view') {
                                        $url = Url::to(['batch/view', 'id' => $model->slug]);
                                        return $url;
                                    }

                                    if ($action === 'update') {
                                        $url = Url::to(['batch/update', 'id' => $model->slug]);
                                        return $url;
                                    }
                                    if ($action === 'delete') {
                                        $url = Url::to(['batch/delete', 'id' => $model->slug]);
                                        return $url;
                                    }

                                },
                            ],
                        ],
                    ]);
?>

            </div>
        </div>
        <!-- /a legend -->

    </div>
</div>
</div>
