<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\bank\models\EmployeeBankDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-bank-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bank_details_id') ?>

    <?= $form->field($model, 'bank_id') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'bankdetails_address') ?>

    <?= $form->field($model, 'bankdetails_phone') ?>

    <?php // echo $form->field($model, 'bankdetails_branch') ?>

    <?php // echo $form->field($model, 'bankdetails_ifsccode') ?>

    <?php // echo $form->field($model, 'bankdetails_accountno') ?>

    <?php // echo $form->field($model, 'bankdetails_dd_payable_address') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
