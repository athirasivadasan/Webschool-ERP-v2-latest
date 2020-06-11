<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Employee */

$this->title = $model->employee_id;
$this->params['breadcrumbs'][] = ['label' => 'Employees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="employee-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->employee_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->employee_id], [
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
            'employee_id',
            'employee_code',
            'employee_firstname',
            'employee_middlename',
            'employee_lastname',
            'employee_dob',
            'employee_qualification',
            'employee_experience',
            'employee_gender',
            'department_id',
            'employee_designation',
            'institution_id',
            'employee_type_id',
            'idcard_issue_date',
            'employee_joiningdate',
            'status',
            'withdrawdate',
            'cardno',
            'slug',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
