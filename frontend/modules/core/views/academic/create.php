<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Academic */

$this->title = 'Create Academic';
$this->params['breadcrumbs'][] = ['label' => 'Academics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content">
    <!-- Breacrumb component -->
    <div
        class="breadcrumb-line breadcrumb-line-light bg-white breadcrumb-line-component header-elements-md-inline mb-4">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                    <?=Yii::t('app', 'Home');?></a>
                <a href="components_breadcrumbs.html" class="breadcrumb-item"><?=Yii::t('app', 'Settings');?></a>
                <span class="breadcrumb-item active"><?=Yii::t('app', 'Academic Details');?></span>
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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title">Academic Year Details</h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <!-- <a class="list-icons-item" data-action="remove"></a> -->
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-highlight">
                        <li class="nav-item">
                            <a href="#icon-only-tab1" class="nav-link active" data-toggle="tab">Academic Details</a>
                        </li>

                        <li class="nav-item">
                            <a href="#icon-only-tab2" class="nav-link" data-toggle="tab">Data Migration</a>
                        </li>


                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="icon-only-tab1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <?= $this->render('_form', ['model' => $model,'listyear' =>$listyear, 'listmonth' => $listmonth, 'searchModel' => $searchModel, 'dataProvider' => $dataProvider,
                                        ]) ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <?= GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        //'filterModel' => $searchModel,
                                        'layout' => '{items}{pager}',
                                        'columns' => [
                                            //['class' => 'yii\grid\SerialColumn'],
                                            
                                            [
                                                'header' => 'Start Year',
                                                'attribute' => 'academic_startyear',
                                            ],
                                            [
                                                'header' => 'Start Month',
                                                'attribute' => 'academic_startmonth',
                                            ],
                                            [
                                                'header' => 'End Year',
                                                'attribute' => 'academic_endyear',
                                            ],
                                            [
                                                'header' => 'End Year',
                                                'attribute' => 'academic_endmonth',
                                            ],
                                            
                                            //'status',
                                           

                                            [
                                                'class' => 'yii\grid\ActionColumn',
                                                'contentOptions' => ['style' => 'width:80px;'],
                                                'template' => '{update}',
                                                'buttons' => array(
                                                    'update' => function ($url, $model) {
                                                        return $model->status == 1 ? Html::a('<span class="icon-pencil"></span>', $url, [
                                            
                                                            'title' => Yii::t('yii', 'Update'),
                                        
                                                            'data-pjax' => '0',
                                        
                                                        ]) : '';
                                                        
                                                    },
                                                        ),
                                                        'visibleButtons' => [
                                                            'update' => function ($model, $key, $index) {
                                                                return true;
                                                              //  return (Yii::$app->user->identity->user_role_id == 1 || Yii::$app->user->identity->user_role_id == 2) ? true : false;
                                                            },
                                                          
                                                        ]
                                                    ],
                                        ],
                                        'options'=>['class'=>'table table-bordered'],
                                    ]); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="icon-only-tab2">
                            Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid
                            laeggin.
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>

</div>