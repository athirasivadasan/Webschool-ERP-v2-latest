<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\EmployeeDetails */

$this->title = $model->employee_details_id;
$this->params['breadcrumbs'][] = ['label' => 'Employee Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="employee-details-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->employee_details_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->employee_details_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'employee_details_id',
            'employee_id',
            'employeedetails_address1',
            'employeedetails_city1',
            'employeedetails_state1',
            'employeedetails_country1',
            'employeedetails_pincode1',
            'employeedetails_address2',
            'employeedetails_city2',
            'employeedetails_state2',
            'employeedetails_country2',
            'employeedetails_pincode2',
            'employeedetails_phone',
            'employeedetails_mobile',
            'employeedetails_email:email',
            'employeedetails_photo',
            'employeedetails_aadhar',
            'employeedetails_pan',
            'employeedetails_pf',
            'employeedetails_esi',
            'slug',
        ],
    ]) ?>

</div>
