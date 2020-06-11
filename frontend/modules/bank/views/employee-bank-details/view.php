<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\bank\models\EmployeeBankDetails */

$this->title = $model->bank_details_id;
$this->params['breadcrumbs'][] = ['label' => 'Employee Bank Details', 'url' => ['index']];
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
            <a href="" class="breadcrumb-item"><?=Yii::t('app', 'HR/Payroll');?></a>
            <a href="<?php echo Url::to(['employee-bank-details/create']); ?>" class="breadcrumb-item"><?=Yii::t('app', 'Bank');?></a>
            <span class="breadcrumb-item active"><?=Yii::t('app', 'Bank Details');?></span>
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
            <h5 class="card-title"><?=Yii::t('app', 'Bank Details');?></h5>
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
                'options' => ['class' => 'table table-borderless'],
                'attributes' => [
                    // 'bank_details_id',
                    [
                        'attribute' => 'employee_id',
                        'value' => function ($model) {
                            if(isset($model->employee_id)){
                                $name = $model->employee->employee_firstname . " " . $model->employee->employee_middlename . " " . $model->employee->employee_lastname;
                            }
                           
                            return isset($model->employee_id) ? $name : '';
                        },
                       
                    ],
                    [
                        'attribute' => 'bank_id',
                        'value' => function ($model) {
                                                      
                            return isset($model->bank_id) ? $model->bank->bank_name : '';
                        },
                    ],
                    // 'bank_id',
                    // 'employee_id',
                    'bankdetails_address',
                    'bankdetails_phone',
                    'bankdetails_branch',
                    'bankdetails_ifsccode',
                    'bankdetails_accountno',
                    'bankdetails_dd_payable_address',
                    // 'slug',
                    // 'created_at',
                    // 'created_by',
                    // 'updated_at',
                    // 'updated_by',
                ],
            ]) ?>
            </div>
        </div>

    </div>

</div>