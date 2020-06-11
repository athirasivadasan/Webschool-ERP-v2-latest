<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\CourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'courseid') ?>

    <?= $form->field($model, 'course_name') ?>

    <?= $form->field($model, 'course_description') ?>

    <?= $form->field($model, 'course_code') ?>

    <?= $form->field($model, 'minimumattendance') ?>

    <?php // echo $form->field($model, 'attendancetype') ?>

    <?php // echo $form->field($model, 'totalworkingdays') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
