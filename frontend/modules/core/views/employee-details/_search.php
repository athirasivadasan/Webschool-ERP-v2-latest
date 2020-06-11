<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\EmployeeDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'employee_details_id') ?>

    <?= $form->field($model, 'employee_id') ?>

    <?= $form->field($model, 'employeedetails_address1') ?>

    <?= $form->field($model, 'employeedetails_city1') ?>

    <?= $form->field($model, 'employeedetails_state1') ?>

    <?php // echo $form->field($model, 'employeedetails_country1') ?>

    <?php // echo $form->field($model, 'employeedetails_pincode1') ?>

    <?php // echo $form->field($model, 'employeedetails_address2') ?>

    <?php // echo $form->field($model, 'employeedetails_city2') ?>

    <?php // echo $form->field($model, 'employeedetails_state2') ?>

    <?php // echo $form->field($model, 'employeedetails_country2') ?>

    <?php // echo $form->field($model, 'employeedetails_pincode2') ?>

    <?php // echo $form->field($model, 'employeedetails_phone') ?>

    <?php // echo $form->field($model, 'employeedetails_mobile') ?>

    <?php // echo $form->field($model, 'employeedetails_email') ?>

    <?php // echo $form->field($model, 'employeedetails_photo') ?>

    <?php // echo $form->field($model, 'employeedetails_aadhar') ?>

    <?php // echo $form->field($model, 'employeedetails_pan') ?>

    <?php // echo $form->field($model, 'employeedetails_pf') ?>

    <?php // echo $form->field($model, 'employeedetails_esi') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
