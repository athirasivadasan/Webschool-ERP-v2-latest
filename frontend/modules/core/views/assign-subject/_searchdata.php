<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\StudentSearch */
/* @var $form yii\widgets\ActiveForm */
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
                <?=$form->field($model, 'course_id', ['inputOptions' => ['class' => 'form-control'],
])->dropDownList($courses, ['prompt' => Yii::t('app', 'Select Course'),'onchange'=>'this.form.submit()']
)->label(false);?>
                </div>
            </fieldset>
        </div>

        
        

    </div>
    
    <!-- <div class="text-right">

        <?=Html::submitButton('Search <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary'])?>

    </div> -->



    <?php ActiveForm::end(); ?>

</div>