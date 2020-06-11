<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\StudentSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$this->registerJs("
 $(document).ready(function (e) {
    $('.card [data-action=reload]:not(.disabled)').on('click', function (e) { 
            
        location.reload();
        
    });
});
", \yii\web\VIEW::POS_READY);
?>
<div class="student-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'post',
    ]); ?>
    <div class="row">

        <div class="col-md-3">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'course_id', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($courses, ['prompt' => Yii::t('app', 'Select Course'), 'onChange' => '$.get( "' . Url::toRoute('/core/student/getbatch') . '", { id: $(this).val() } )
               .done(function( data ) {  
               
                   $( "#' . Html::getInputId($model, 'batch_id') . '" ).html( data );
                   
               }
               ); 
              

               ']
)->label(false);?>
                </div>
            </fieldset>
        </div>

        <div class="col-md-3">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'batch_id', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList([], ['prompt' => Yii::t('app', 'Select Batch'),'onchange'=>'this.form.submit()']
)->label(false);?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-3"></div>

        <div class="col-md-3">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'student_admission_no', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text', ['placeholder' => Yii::t('app', 'Search.....')])->label(false);?>

                </div>
            </fieldset>
            
        </div>
        

    </div>
    
    <!-- <div class="text-right">

        <?=Html::submitButton('Search <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary'])?>

    </div> -->



    <?php ActiveForm::end(); ?>

</div>