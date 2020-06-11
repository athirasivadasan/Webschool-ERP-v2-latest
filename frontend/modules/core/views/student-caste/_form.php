<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\StudentCaste */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-caste-form">

<?php $form = ActiveForm::begin([
'enableClientValidation' => true,'enableAjaxValidation' => true,'enableClientScript' => false,
]); ?>

    <fieldset>
        <legend class="font-weight-semibold text-uppercase font-size-sm"><?=Yii::t('app', 'Add Student Caste');?></legend>


        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'student_caste_name',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

                <?=$form->field($model, 'student_caste_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('text', ['placeholder' => "Caste"])->label(false);?>
            </div>
        </div>
       

    </fieldset>



    <div class="text-right">

        <?= Html::submitButton('Save <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
