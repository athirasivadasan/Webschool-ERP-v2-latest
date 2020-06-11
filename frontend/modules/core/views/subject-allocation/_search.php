<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\SubjectAllocationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-allocation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'subjectallocation_id') ?>

    <?= $form->field($model, 'course_id') ?>

    <?= $form->field($model, 'batch_id') ?>

    <?= $form->field($model, 'subject_id') ?>

    <?= $form->field($model, 'institution_id') ?>

    <?php // echo $form->field($model, 'employee_id') ?>

    <?php // echo $form->field($model, 'department_id') ?>

    <?php // echo $form->field($model, 'academic_id') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
