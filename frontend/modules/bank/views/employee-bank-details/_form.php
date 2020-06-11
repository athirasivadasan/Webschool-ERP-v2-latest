<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\bank\models\EmployeeBankDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-bank-details-form">

    <?php $form = ActiveForm::begin([

'enableClientValidation' => false,
'enableAjaxValidation' => true,
'enableClientScript' => false,

]); ?>

    <fieldset>
        <legend class="font-weight-semibold text-uppercase font-size-sm">
        <?php echo $model->isNewRecord ? Yii::t('app', 'Add Bank Details') : Yii::t('app', 'Update Bank Details')?>
        </legend>

        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'designation',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

                <?=$form->field($model, 'designation', ['inputOptions' => ['class' => 'form-control'],
               ])->dropDownList($designation, ['prompt' => 'Please Select','onChange' => '$.get( "' . Url::toRoute('/bank/employee-bank-details/getemployee') . '", { id: $(this).val() } )
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
               <?php 
               if($model->isNewRecord){
                $employee = [];
               }
               ?>
                <?=$form->field($model, 'employee_id', ['inputOptions' => ['class' => 'form-control'],
               ])->dropDownList($employee, ['prompt' => 'Please Select']
               )->label(false);?>
            </div>
        </div>

        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'bank_id',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

                <?=$form->field($model, 'bank_id', ['inputOptions' => ['class' => 'form-control'],
               ])->dropDownList($bank, ['prompt' => 'Please Select']
               )->label(false);?>
            </div>
        </div>
        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'bankdetails_branch',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

                <?=$form->field($model, 'bankdetails_branch', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('text')->label(false);?>
            </div>
        </div>
       
        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'bankdetails_address',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

                <?=$form->field($model, 'bankdetails_address')->textarea(array('rows' => 2, 'cols' => 5, 'placeholder' => "Address", 'class' => 'form-control'))->label(false);?>
            </div>
        </div>
        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'bankdetails_phone',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

                <?=$form->field($model, 'bankdetails_phone', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('text')->label(false);?>
            </div>
        </div>
        
        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'bankdetails_ifsccode',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

                <?=$form->field($model, 'bankdetails_ifsccode', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('text')->label(false);?>
            </div>
        </div>

        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'bankdetails_accountno',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

                <?=$form->field($model, 'bankdetails_accountno', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('text')->label(false);?>
            </div>
        </div>
        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'bankdetails_dd_payable_address',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

                <?=$form->field($model, 'bankdetails_dd_payable_address', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('text')->label(false);?>
            </div>
        </div>

    </fieldset>



    <div class="text-right">

        <?= Html::submitButton('Save <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>