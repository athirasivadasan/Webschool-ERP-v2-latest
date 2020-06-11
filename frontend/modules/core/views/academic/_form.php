<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Academic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="academic-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => true,
        'enableAjaxValidation' => true,
        'enableClientScript' => false,

    ]); ?>


    <?=$form->field($model, 'academic_startyear', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->dropDownList($listyear, ['prompt' => 'Please Select'])->label('Start Year');?>

    <?=$form->field($model, 'academic_startmonth', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->dropDownList($listmonth, ['prompt' => 'Please Select'])->label('Start Month');?>


    <?=$form->field($model, 'academic_endyear', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->dropDownList($listyear, ['prompt' => 'Please Select'])->label('End Year');?>

    <?=$form->field($model, 'academic_endmonth', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->dropDownList($listmonth, ['prompt' => 'Please Select'])->label('End Month');?>

    <?=$form->field($model, 'status', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->dropDownList(
                   ['1' => 'Active', '2' => 'Deactive']
               )->label('Active / Deactive');?>





    <div class="form-group">
        <?=Html::submitButton('Save <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>