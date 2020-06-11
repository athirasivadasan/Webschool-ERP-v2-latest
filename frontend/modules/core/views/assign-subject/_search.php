<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\AssignSubjectSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assign-subject-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'assign_subject_id') ?>

    <?= $form->field($model, 'subject_id') ?>

    <?= $form->field($model, 'course_id') ?>

    <?= $form->field($model, 'batch_id') ?>

    <?= $form->field($model, 'institution_id') ?>

    <?php // echo $form->field($model, 'ccesubjectgroup') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
