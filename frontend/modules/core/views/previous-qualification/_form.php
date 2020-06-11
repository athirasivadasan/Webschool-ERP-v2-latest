<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\PreviousQualification */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="previous-qualification-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'qualification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'previousqualification_schoolname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'previousqualification_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'score')->textInput() ?>

    <?= $form->field($model, 'online_enquiryid')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
