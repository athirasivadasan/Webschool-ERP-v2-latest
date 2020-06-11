<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\EmployeeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'employee_code') ?>

    <?= $form->field($model, 'employee_firstname') ?>

    <?= $form->field($model, 'employee_middlename') ?>

    <?= $form->field($model, 'employee_lastname') ?>

    <?php // echo $form->field($model, 'employee_dob') ?>

    <?php // echo $form->field($model, 'employee_qualification') ?>

    <?php // echo $form->field($model, 'employee_experience') ?>

    <?php // echo $form->field($model, 'employee_gender') ?>

    <?php // echo $form->field($model, 'department_id') ?>

    <?php // echo $form->field($model, 'employee_designation') ?>

    <?php // echo $form->field($model, 'institution_id') ?>

    <?php // echo $form->field($model, 'employee_type_id') ?>

    <?php // echo $form->field($model, 'designation_id') ?>

    <?php // echo $form->field($model, 'idcard_issue_date') ?>

    <?php // echo $form->field($model, 'employee_joiningdate') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'withdrawdate') ?>

    <?php // echo $form->field($model, 'cardno') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
