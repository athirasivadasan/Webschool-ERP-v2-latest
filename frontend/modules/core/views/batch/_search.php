<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\BatchSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="batch-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'batchid') ?>

    <?= $form->field($model, 'institutionid') ?>

    <?= $form->field($model, 'courseid') ?>

    <?= $form->field($model, 'batch_name') ?>

    <?= $form->field($model, 'batch_startdate') ?>

    <?php // echo $form->field($model, 'batch_enddate') ?>

    <?php // echo $form->field($model, 'max_no_of_students') ?>

    <?php // echo $form->field($model, 'venue') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
