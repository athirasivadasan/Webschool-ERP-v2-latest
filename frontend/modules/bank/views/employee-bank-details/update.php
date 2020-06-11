<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\bank\models\EmployeeBankDetails */

$this->title = 'Update Employee Bank Details: ' . $model->bank_details_id;
$this->params['breadcrumbs'][] = ['label' => 'Employee Bank Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bank_details_id, 'url' => ['view', 'id' => $model->bank_details_id]];
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
            <a href="<?php echo Url::to(['employee-bank-details/create']); ?>"
                class="breadcrumb-item"><?=Yii::t('app', 'Bank');?></a>
            <span class="breadcrumb-item active"><?=Yii::t('app', 'Add Bank Details');?></span>
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
            <?=Yii::t('app', 'Employee Bank Details');?>
            
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
                        'model' => $model,'bank' => $bank,'designation' => $designation,'employee' => $employee
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
                    ['class' => 'yii\grid\SerialColumn',
                    'header' => 'Sl No'],
                    // 'employee_id',
                    [
                        'attribute' => 'employee_id',
                        'value' => function ($data) {
                            if(isset($data->employee_id)){
                                $name = $data->employee->employee_firstname . " " . $data->employee->employee_middlename . " " . $data->employee->employee_lastname;
                            }
                           
                            return isset($data->employee_id) ? $name : '';
                        },
                    ],
                    // 'bank_details_id',
                    // 'bank_id',
                    [
                        'attribute' => 'bank_id',
                        'value' => function ($data) {
                                                      
                            return isset($data->bank_id) ? $data->bank->bank_name : '';
                        },
                    ],
                   
                    // 'bankdetails_address',                    
                    'bankdetails_branch',
                    // 'bankdetails_ifsccode',
                    // 'bankdetails_phone',
                    
                    'bankdetails_accountno',
                    //'bankdetails_dd_payable_address',
                    //'slug',
                    //'created_at',
                    //'created_by',
                    //'updated_at',
                    //'updated_by',
                  
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Manage',
                        'template' => '{delete}',
                        'template' => '{view}{update}',
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
                            
            
                        ],
                        'urlCreator' => function ($action, $model, $key, $index) {
                           
            
                            if ($action === 'update') {
                                $url = Url::to(['employee-bank-details/update', 'id' => $model->slug]);
                                return $url;
                            }
                            if ($action === 'view') {
                                $url = Url::to(['employee-bank-details/view', 'id' => $model->slug]);
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

