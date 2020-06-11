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
<?php yii\widgets\Pjax::begin(['id' => 'employee']) ?>
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'post',
    ]); ?>
    <div class="row">

    <div class="col-md-9"></div>

        <div class="col-md-3">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'employee_firstname', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text', ['placeholder' => Yii::t('app', 'Search.....')])->label(false);?>

                </div>
            </fieldset>
            
        </div>
        

    </div>
    
    <!-- <div class="text-right">

        <?=Html::submitButton('Search <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary'])?>

    </div> -->



    <?php ActiveForm::end(); ?>
    <?php yii\widgets\Pjax::end() ?>
</div>