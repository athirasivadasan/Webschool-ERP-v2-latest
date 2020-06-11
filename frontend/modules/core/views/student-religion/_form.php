<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\StudentReligion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-religion-form">
    <?php $form = ActiveForm::begin([
'enableClientValidation' => true,'enableAjaxValidation' => true,'enableClientScript' => false,
]); ?>

    <fieldset>
        <legend class="font-weight-semibold text-uppercase font-size-sm"><?=Yii::t('app', 'Add Student Religion');?>
        </legend>


        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'student_religion_name',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

                <?=$form->field($model, 'student_religion_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('text', ['placeholder' => "Religion"])->label(false);?>
            </div>
        </div>


    </fieldset>



    <div class="text-right">

        <?= Html::submitButton('Save <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>    

</div>