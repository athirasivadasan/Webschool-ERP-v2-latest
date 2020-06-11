<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\AssignSubject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assign-subject-form">

<?php $form = ActiveForm::begin([

'enableClientValidation' => false,
'enableAjaxValidation' => true,
'enableClientScript' => false,

]); ?>

    <fieldset>
        <!-- <legend class="font-weight-semibold text-uppercase font-size-sm"><?php echo $model->isNewRecord ? Yii::t('app', 'Add Subject') : Yii::t('app', 'Update Subject')?></legend> -->
        <?php if (Yii::$app->session->hasFlash('assignsubject_error')): ?>

        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
            <?= Yii::$app->session->getFlash('assignsubject_error') ?>

        </div>

        <?php endif; ?>
        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'course_id',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

                <?=$form->field($model, 'course_id', ['inputOptions' => ['class' => 'form-control'],
])->dropDownList($courses, ['prompt' => Yii::t('app', 'Select Course'), 'onChange' => '$.get( "' . Url::toRoute('/core/student/getbatch') . '", { id: $(this).val() } )
               .done(function( data ) {
                // $.pjax({container: "#pjax-grid-view"});
                   $( "#' . Html::getInputId($model, 'batch_id') . '" ).html( data );
                   

                   
               }
               );

               ', ]
)->label(false);?>
            </div>
        </div>
        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'batch_id',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">

                <?=$form->field($model, 'batch_id[]', ['inputOptions' => ['multiple'=>'multiple','class' => 'form-control'],
])->dropDownList([], ['prompt' => Yii::t('app', 'Select Batch'), 'onChange' => '$.get( "' . Url::toRoute('/core/assign-subject/getsubject') . '" )
               .done(function( data ) {
                   $( "#' . Html::getInputId($model, 'subject_id') . '" ).html( data );
               }
               );

               ', ]
)->label(false);?>
            </div>
        </div>

        <div class="form-group row">
            <label
                class="col-lg-3 col-form-label"><?= $form->field($model, 'subject_id',['template' => '{label}'])->input('hidden') ?></label>
            <div class="col-lg-9">
                <?= $form->field($model, 'subject_id[]')->dropDownList([],['multiple'=>'multiple','class'=>'form-control', ])->label(false); ?>
            </div>
        </div>





    </fieldset>



    <div class="text-right">

        <?= Html::submitButton('Save <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>