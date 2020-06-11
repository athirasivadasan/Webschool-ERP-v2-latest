<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\PreviousQualificationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="previous-qualification-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'previousqualification_id') ?>

    <?= $form->field($model, 'qualification') ?>

    <?= $form->field($model, 'previousqualification_schoolname') ?>

    <?= $form->field($model, 'previousqualification_address') ?>

    <?= $form->field($model, 'score') ?>

    <?php // echo $form->field($model, 'online_enquiryid') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
