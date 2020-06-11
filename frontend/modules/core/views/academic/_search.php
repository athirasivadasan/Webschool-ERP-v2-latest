<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\AcademicSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="academic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'academicid') ?>

    <?= $form->field($model, 'academic_startyear') ?>

    <?= $form->field($model, 'academic_endyear') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'academic_startmonth') ?>

    <?php // echo $form->field($model, 'academic_endmonth') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
