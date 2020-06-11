<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\EmployeeDetails */

$this->title = 'Update Employee Details: ' . $model->employee_details_id;
$this->params['breadcrumbs'][] = ['label' => 'Employee Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->employee_details_id, 'url' => ['view', 'id' => $model->employee_details_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employee-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
