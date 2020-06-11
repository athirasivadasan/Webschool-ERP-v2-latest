<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\StudentReligion */

$this->title = 'Update Student Religion: ' . $model->student_religion_id;
$this->params['breadcrumbs'][] = ['label' => 'Student Religions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_religion_id, 'url' => ['view', 'id' => $model->student_religion_id]];
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
            <a href="" class="breadcrumb-item"><?=Yii::t('app', 'Student');?></a>

            <span class="breadcrumb-item active"><?=Yii::t('app', 'Caste And Religion');?></span>
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
                <h6 class="card-title">Caste And Religion</h6>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>

                    </div>
                </div>
            </div>

            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="nav-item">
                        <a href="<?php echo Url::to(['student-caste/create']); ?>" class="nav-link ">Student
                            Caste</a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo Url::to(['student-religion/create']); ?>" class="nav-link active">Student
                            Religion</a>
                    </li>


                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade " id="icon-only-tab1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade active show" id="icon-only-tab2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                    <?=$this->render('_form', [
                                        'model' => $model,'dataProvider' => $dataProvider
                                        ])?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                    <?=
                                    GridView::widget([
                                        'dataProvider' => $dataProvider,
                                        'columns' => [
                                            ['class' => 'yii\grid\SerialColumn'],
                                            //'student_religion_id',
                                            'student_religion_name',
                                            // 'status',
                                            // 'slug',
                                            [
                                                'class' => 'yii\grid\ActionColumn',
                                                'header' => 'Actions',
                                                'headerOptions' => ['style' => 'color:#337ab7'],
                                                'template' => '{update}{delete}',
                                                'buttons' => [
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
                                                    if ($action === 'update') {
                                                        $url = Url::to(['student-religion/update', 'id' => $model->slug]);
                                                        return $url;
                                                    }
                                                    if ($action === 'delete') {
                                                        $url = Url::to(['student-religion/delete', 'id' => $model->slug]);
                                                        return $url;
                                                    }

                                                },
                                            ],
                                        ],
                                    ]);
                                ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


</div>
</div>
