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
        'action' => ['create'],
        'method' => 'post',
    ]); ?>
    <div class="row">

    <div class="col-md-8"></div>
    <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                <?=$form->field($model, 'search', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('text', ['placeholder' => Yii::t('app', 'Search.....')])->label(false);?>
                </div>
            </fieldset>
        </div>




    </div>

    <?php ActiveForm::end(); ?>

</div>