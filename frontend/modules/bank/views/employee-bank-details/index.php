<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\bank\models\EmployeeBankDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee Bank Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-bank-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employee Bank Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bank_details_id',
            'bank_id',
            'employee_id',
            'bankdetails_address',
            'bankdetails_phone',
            //'bankdetails_branch',
            //'bankdetails_ifsccode',
            //'bankdetails_accountno',
            //'bankdetails_dd_payable_address',
            //'slug',
            //'created_at',
            //'created_by',
            //'updated_at',
            //'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
