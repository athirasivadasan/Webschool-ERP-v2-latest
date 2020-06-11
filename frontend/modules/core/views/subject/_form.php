<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Subject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-form">

<?php $form = ActiveForm::begin([

'enableClientValidation' => false,
'enableAjaxValidation' => true,
'enableClientScript' => false,

]); ?>

        <fieldset>
            <legend class="font-weight-semibold text-uppercase font-size-sm"><?php echo $model->isNewRecord ? Yii::t('app', 'Add Subject') : Yii::t('app', 'Update Subject')?></legend>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label"><?= $form->field($model, 'subject_name',['template' => '{label}'])->input('hidden') ?></label>
                <div class="col-lg-9">
                   
                    <?=$form->field($model, 'subject_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('text')->label(false);?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label"><?= $form->field($model, 'subject_code',['template' => '{label}'])->input('hidden') ?></label>
                <div class="col-lg-9">
                <?=$form->field($model, 'subject_code', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('text')->label(false);?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label"><?= $form->field($model, 'subject_description',['template' => '{label}'])->input('hidden') ?></label>
                <div class="col-lg-9">
               <?=$form->field($model, 'subject_description')
               ->textarea(array('rows' => 2, 'cols' => 5, 'placeholder' => Yii::t('app', 'Description'), 'class' => 'form-control'))->label(false);?>
                </div>
            </div>

            

            
           
        </fieldset>

       

        <div class="text-right">
           
            <?= Html::submitButton('Save <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

</div>
