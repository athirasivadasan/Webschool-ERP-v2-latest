<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Batch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$this->registerJs("
 $(document).ready(function (e) {

     $('.batch_startdate').datepicker({autoclose:true});
     $('.batch_enddate').datepicker({autoclose:true});
     
 });
 
", \yii\web\VIEW::POS_READY);
?>
<div class="batch-form">

    <?php $form = ActiveForm::begin([
'enableClientValidation' => true,'enableAjaxValidation' => true,
]); ?>

    <fieldset>
        <legend class="font-weight-semibold text-uppercase font-size-sm">Add Batch</legend>

        <?php if (Yii::$app->session->hasFlash('error')): ?>

        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
             <?= Yii::$app->session->getFlash('error') ?>
            
        </div>

        <?php endif; ?>


        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'courseid',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

                <?=$form->field($model, 'courseid', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->dropDownList($courses, ['prompt' => 'Please Select']
               )->label(false);?>
            </div>
        </div>

        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'batch_name',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">
                <?=$form->field($model, 'batch_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('text', ['placeholder' => "Batch Name"])->label(false);?>
            </div>
        </div>

        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'batch_startdate',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9 ">

                <?=$form->field($model, 'batch_startdate', ['inputOptions' => ['class' => 'batch_startdate form-control'],
               ])->textInput()->input('text', ['placeholder' => "Start Date"])->label(false);?>


            </div>

        </div>


        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'batch_enddate',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

                <?=$form->field($model, 'batch_enddate', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'batch_enddate form-control'],
               ])->textInput()->input('text', ['placeholder' => "End Date"])->label(false);?>
            </div>
        </div>
        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'max_no_of_students',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

                <?=$form->field($model, 'max_no_of_students', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('text', ['placeholder' => "Maximum Number of Students"])->label(false);?>
            </div>
        </div>

    </fieldset>



    <div class="text-right">

        <?= Html::submitButton('Save <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>