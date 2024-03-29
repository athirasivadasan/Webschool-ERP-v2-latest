<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\UserType */

$this->title = 'Create User Type';
$this->params['breadcrumbs'][] = ['label' => 'User Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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
            <a href="<?php echo Url::to(['user-type/create']); ?>" class="breadcrumb-item"><?=Yii::t('app', 'User Type');?></a>
            <span class="breadcrumb-item active"><?=Yii::t('app', 'Add User Type');?></span>
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
                <?=Yii::t('app', 'User Type');?>
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
    'model' => $model, 'dataProvider' => $dataProvider,
])?>
            </div>
        </div>
        <!-- /basic legend -->

    </div>

    <div class="col-md-6">

        <!-- Advanced legend -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title"><?=Yii::t('app', 'User Type');?></h5>
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
                        // 'usertypeid',
                        'usertype_name',
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
                            'visibleButtons' => [
                                'update' => function ($model, $key, $index) {
                                    return ($model->usertypeid > 4 ) ? true : false;
                                },
                                'delete' => function ($model, $key, $index) {
                                    return ($model->usertypeid > 4) ? true : false;
                                }
                            ],
                            'urlCreator' => function ($action, $model, $key, $index) {
                               

                                if ($action === 'update') {
                                    $url = Url::to(['user-type/update', 'id' => $model->slug]);
                                    return $url;
                                }
                                if ($action === 'delete') {
                                    $url = Url::to(['user-type/delete', 'id' => $model->slug]);
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
