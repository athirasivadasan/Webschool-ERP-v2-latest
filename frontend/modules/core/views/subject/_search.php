<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\SubjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'subject_id') ?>

    <?= $form->field($model, 'subject_name') ?>

    <?= $form->field($model, 'subject_code') ?>

    <?= $form->field($model, 'subject_description') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
