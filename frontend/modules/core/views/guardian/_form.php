<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Guardian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guardian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'guardian_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_relation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_education')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_occupation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'guardian_income')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
