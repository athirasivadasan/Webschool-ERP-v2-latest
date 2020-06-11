<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model frontend\modules\bank\models\BankDetails */

$this->title = 'Create Bank Details';
$this->params['breadcrumbs'][] = ['label' => 'Bank Details', 'url' => ['index']];
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
                <a href="<?php echo Url::to(['bank-details/create']); ?>"
                    class="breadcrumb-item"><?=Yii::t('app', 'Bank');?></a>
                <span class="breadcrumb-item active"><?=Yii::t('app', 'Add Bank');?></span>
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
            <h5 class="card-title">
                <?=Yii::t('app', 'Bank Details');?>
                
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

            <div class="row">
                <div class="col-md-6">


                    <div class="card">
                        <div class="card-body">
                            <?=$this->render('_form', [
                            'model' => $model
                        ])?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">


                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => '{items}{pager}',
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                      
                        'bank_name',
                      
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Actions',
                            'headerOptions' => ['style' => 'color:#337ab7'],
                            'template' => '{delete}',
                            'buttons' => [
                               
                                
                                'delete' => function ($url, $model) {
                                    return Html::a('<span class="icon-cross2"></span>', $url, [
                                        'title' => Yii::t('app', 'delete'),
                                    ]);
                                },

                            ],
                           
                            'urlCreator' => function ($action, $model, $key, $index) {
                               

                                if ($action === 'delete') {
                                    $url = Url::to(['bank-details/delete', 'id' => $model->slug]);
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