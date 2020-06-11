<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\EmployeeDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'employee_id')->textInput() ?>

    <?= $form->field($model, 'employeedetails_address1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_city1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_state1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_country1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_pincode1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_address2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_city2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_state2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_country2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_pincode2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_aadhar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_pan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_pf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'employeedetails_esi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
