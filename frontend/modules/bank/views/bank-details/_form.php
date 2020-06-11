<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\bank\models\BankDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-details-form">

<?php $form = ActiveForm::begin([
    'enableClientValidation' => true, 'enableAjaxValidation' => true,
]);?>

    <fieldset>
        <legend class="font-weight-semibold text-uppercase font-size-sm"><?php echo $model->isNewRecord ? Yii::t('app', 'Add Bank Details') : Yii::t('app', 'Update Bank Details')?></legend>

          

        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?=$form->field($model, 'bank_name', ['template' => '{label}'])->input('hidden')?></label>
            <div class="col-lg-9">
                <?=$form->field($model, 'bank_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text', ['placeholder' => Yii::t('app', 'Bank Name')])->label(false);?>
            </div>
        </div>

       

    </fieldset>



    <div class="text-right">

        <?=Html::submitButton('Save <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary'])?>
    </div>
    <?php ActiveForm::end();?>

    
</div>
