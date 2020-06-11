<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\SubjectAllocation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-allocation-form">

<?php $form = ActiveForm::begin([
'enableClientValidation' => false,
'enableAjaxValidation' => true,
'enableClientScript' => false,

]); ?>

    <fieldset>

    <?php if (Yii::$app->session->hasFlash('subject-allocation')): ?>

<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
    <?= Yii::$app->session->getFlash('subject-allocation') ?>

</div>

<?php endif; ?>
        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'department_id',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

            <?=$form->field($model, 'department_id', ['inputOptions' => ['class' => 'form-control'],
               ])->dropDownList($department, ['prompt' => 'Please Select','onChange' => '$.get( "' . Url::toRoute('/core/subject-allocation/getemployee') . '", { id: $(this).val() } )
               .done(function( data ) {
                   $( "#' . Html::getInputId($model, 'employee_id') . '" ).html( data );
               }
               );

               ']
               )->label(false);?>
            </div>
        </div>
        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'employee_id',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">
            <?=$form->field($model, 'employee_id', ['inputOptions' => ['class' => 'form-control'],
               ])->dropDownList($employee, ['prompt' => 'Please Select']
               )->label(false);?>
            </div>
        </div>

        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'course_id',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

            
            <?=$form->field($model, 'course_id', ['inputOptions' => ['class' => 'form-control'],
               ])->dropDownList($course, ['prompt' => 'Please Select','onChange' => '$.get( "' . Url::toRoute('/core/student/getbatch') . '", { id: $(this).val() } )
               .done(function( data ) {
                   $( "#' . Html::getInputId($model, 'batch_id') . '" ).html( data );
               }
               );

               ']
               )->label(false);?>
            </div>
        </div>

        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'batch_id',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">
            <?=$form->field($model, 'batch_id', ['inputOptions' => ['class' => 'form-control'],
               ])->dropDownList($batch, ['prompt' => 'Please Select', 'onChange' => '$.get( "' . Url::toRoute('/core/subject-allocation/getsubject') . '", { batch: $(this).val(),course:$( "#' . Html::getInputId($model, 'course_id') . '" ).val() } )
               .done(function( data ) {
                   $( "#' . Html::getInputId($model, 'subject_id') . '" ).html( data );
               }
               );

               ']
               )->label(false);?>
            </div>
        </div>

        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'subject_id',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">
            <?=$form->field($model, 'subject_id', ['inputOptions' => ['class' => 'form-control'],
               ])->dropDownList($subject, ['prompt' => 'Please Select']
               )->label(false);?>
            </div>
        </div>





    </fieldset>



    <div class="text-right">

        <?= Html::submitButton('Save <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <br><br>

</div>