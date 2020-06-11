<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\StudentCasteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-caste-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'studentcasteid') ?>

    <?= $form->field($model, 'student_caste_name') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'slug') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
