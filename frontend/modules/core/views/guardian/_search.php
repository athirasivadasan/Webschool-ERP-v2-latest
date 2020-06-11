<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\GuardianSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guardian-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'guardian_id') ?>

    <?= $form->field($model, 'guardian_name') ?>

    <?= $form->field($model, 'guardian_phone') ?>

    <?= $form->field($model, 'guardian_address') ?>

    <?= $form->field($model, 'guardian_city') ?>

    <?php // echo $form->field($model, 'guardian_state') ?>

    <?php // echo $form->field($model, 'guardian_country') ?>

    <?php // echo $form->field($model, 'guardian_email') ?>

    <?php // echo $form->field($model, 'guardian_photo') ?>

    <?php // echo $form->field($model, 'guardian_mobile') ?>

    <?php // echo $form->field($model, 'guardian_relation') ?>

    <?php // echo $form->field($model, 'guardian_education') ?>

    <?php // echo $form->field($model, 'guardian_occupation') ?>

    <?php // echo $form->field($model, 'guardian_income') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
