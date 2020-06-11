<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\core\models\EmployeeDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employee Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Employee Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'employee_details_id',
            'employee_id',
            'employeedetails_address1',
            'employeedetails_city1',
            'employeedetails_state1',
            //'employeedetails_country1',
            //'employeedetails_pincode1',
            //'employeedetails_address2',
            //'employeedetails_city2',
            //'employeedetails_state2',
            //'employeedetails_country2',
            //'employeedetails_pincode2',
            //'employeedetails_phone',
            //'employeedetails_mobile',
            //'employeedetails_email:email',
            //'employeedetails_photo',
            //'employeedetails_aadhar',
            //'employeedetails_pan',
            //'employeedetails_pf',
            //'employeedetails_esi',
            //'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
