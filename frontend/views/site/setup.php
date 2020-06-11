<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


$this->title = 'Setup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Initial Setup Wizard Configuration</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <div class="card-body">
       

        <?php $form = ActiveForm::begin([
    'enableClientValidation' => true,
    'enableAjaxValidation' => true,
    'enableClientScript' => false,

]);?>
        <div class="row">
            
            <div class="col-md-4">
                <fieldset>
                    <div class="form-group">
                        <?=$form->field($model, 'institution_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text', ['placeholder' => " Institution Name "]);?>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-4">
                <fieldset>
                    <div class="form-group">
                        <?=$form->field($model, 'institution_contactemail', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('email', ['placeholder' => " Institution Email "])->label('Institution Email');?>
                    </div>
                </fieldset>
            </div>
            <div class="col-md-4">
                <fieldset>
                    <div class="form-group">
                        <?=$form->field($model, 'institution_phone', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text', ['placeholder' => "  Institution Phone  "])->label(' Institution Phone ');?>
                    </div>
                </fieldset>
            </div>
        </div>
       
        <div class="text-right">
            <?=Html::submitButton('Save <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary'])?>
        </div>
        <?php ActiveForm::end();?>

    </div>
</div>