<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\InstitutionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="institution-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'institution_id') ?>

    <?= $form->field($model, 'institution_name') ?>

    <?= $form->field($model, 'institution_contactperson') ?>

    <?= $form->field($model, 'institution_contactemail') ?>

    <?= $form->field($model, 'institution_phone') ?>

    <?php // echo $form->field($model, 'institution_address') ?>

    <?php // echo $form->field($model, 'institution_fax') ?>

    <?php // echo $form->field($model, 'institution_mobile') ?>

    <?php // echo $form->field($model, 'institution_created_on') ?>

    <?php // echo $form->field($model, 'institution_updated_on') ?>

    <?php // echo $form->field($model, 'institution_language') ?>

    <?php // echo $form->field($model, 'institution_timezone') ?>

    <?php // echo $form->field($model, 'institution_logo') ?>

    <?php // echo $form->field($model, 'institution_country') ?>

    <?php // echo $form->field($model, 'institution_currency_type') ?>

    <?php // echo $form->field($model, 'institution_liscencestatus') ?>

    <?php // echo $form->field($model, 'institution_groupid') ?>

    <?php // echo $form->field($model, 'institution_code') ?>

    <?php // echo $form->field($model, 'isautogeneration') ?>

    <?php // echo $form->field($model, 'institution_facebookurl') ?>

    <?php // echo $form->field($model, 'institution_youtubeurl') ?>

    <?php // echo $form->field($model, 'institution_twitterurl') ?>

    <?php // echo $form->field($model, 'institution_website') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
