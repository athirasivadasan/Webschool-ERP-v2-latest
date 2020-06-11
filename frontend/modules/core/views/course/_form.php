<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">
<?php $form = ActiveForm::begin([

'enableClientValidation' => false,
'enableAjaxValidation' => true,
'enableClientScript' => false,

]); ?>

        <fieldset>
            <legend class="font-weight-semibold text-uppercase font-size-sm"><?=Yii::t('app', 'Add Course');?></legend>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label"><?= $form->field($model, 'course_name',['template' => '{label}'])->input('hidden') ?></label>
                <div class="col-lg-9">
                   
                    <?=$form->field($model, 'course_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('text', ['placeholder' => "Course Name"])->label(false);?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label"><?= $form->field($model, 'course_description',['template' => '{label}'])->input('hidden') ?></label>
                <div class="col-lg-9">
               <?=$form->field($model, 'course_description')
               ->textarea(array('rows' => 2, 'cols' => 5, 'placeholder' => "Description", 'class' => 'form-control'))->label(false);?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label"><?= $form->field($model, 'course_code',['template' => '{label}'])->input('hidden') ?></label>
                <div class="col-lg-9">
                <?=$form->field($model, 'course_code', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('course_code', ['placeholder' => "Code"])->label(false);?>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-3 col-form-label"><?= $form->field($model, 'minimumattendance',['template' => '{label}'])->input('hidden') ?></label>
                <div class="col-lg-9">
               
                <?=$form->field($model, 'minimumattendance', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('minimumattendance', ['placeholder' => "Minimum Attendance Percentage"])->label(false);?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label"><?= $form->field($model, 'attendancetype',['template' => '{label}'])->input('hidden') ?></label>
                <div class="col-lg-9">
               
                <?=$form->field($model, 'attendancetype', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->dropDownList($type,['prompt' => 'Please Select']
               )->label(false);?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label"><?= $form->field($model, 'totalworkingdays',['template' => '{label}'])->input('hidden') ?></label>
                <div class="col-lg-9">
               
                <?=$form->field($model, 'totalworkingdays', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->textInput()->input('totalworkingdays', ['placeholder' => " Total Working Days "])->label(false);?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-3 col-form-label"><?= $form->field($model_syllabus, 'syllabus_name',['template' => '{label}'])->input('hidden') ?></label>
                <div class="col-lg-9">
               
                <?=$form->field($model_syllabus, 'syllabus_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
               ])->dropDownList($syllabus_type, ['prompt' => 'Please Select']
               )->label(false);?>
                </div>
            </div>
           
        </fieldset>

       

        <div class="text-right">
           
            <?= Html::submitButton('Save <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
</div>