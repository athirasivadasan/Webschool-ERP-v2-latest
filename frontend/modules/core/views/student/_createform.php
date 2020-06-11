<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$this->registerJs("
 $(document).ready(function (e) {
     

     $('.student_admission_date').datepicker({autoclose:true});
     $('.student_dob').datepicker({autoclose:true});

    /*var disabledDates = ['30/6/2020','3/6/2020'];

    $('.student_dob').datepicker({
        format: 'dd/mm/yyyy',
        maxViewMode: 1,
        todayBtn: \"linked\",
        clearBtn: true,
        daysOfWeekDisabled: \"0,6\",
        datesDisabled: disabledDates
    })*/
     

 });

 /* To initialize BS3 tooltips set this below */
$(function () {
    $(\"[data-toggle='tooltip']\").tooltip();
});;
/* To initialize BS3 popovers set this below */
$(function () {
    $(\"[data-toggle='popover']\").popover();
});




", \yii\web\VIEW::POS_READY);
?>

<div class="student-form">

    <?php $form = ActiveForm::begin([
    'enableClientValidation' => true,
    'enableAjaxValidation' => true,
    'enableClientScript' => false,

]);?>

    <div class="row">

        <legend class="font-weight-semibold">OFFICIAL DETAILS</legend>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'academic_id', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($academiclist, ['prompt' => Yii::t('app', 'Select Academic Year')]
);?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=Html::tag('span', '<span class="icon-pencil"></span>', [
    'title' => 'Student Admission Number might be changed at the time of submission ',
    'data-toggle' => 'tooltip',
    'style' => 'color: red; cursor:pointer;position: absolute;
                margin-left: 149px;',
]);?>
                    <?=$form->field($model, 'student_admission_no', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'readonly' => true],
])->textInput()->input('text');?>


                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'student_admission_date', ['inputOptions' => ['class' => 'student_admission_date form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'course_id', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($courses, ['prompt' => Yii::t('app', 'Select Course'), 'onChange' => '$.get( "' . Url::toRoute('/core/student/getbatch') . '", { id: $(this).val() } )
               .done(function( data ) {
                   $( "#' . Html::getInputId($model, 'batch_id') . '" ).html( data );
               }
               );

               ', ]
);?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'batch_id', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList([], ['prompt' => Yii::t('app', 'Select Batch')]
);?>
                </div>
            </fieldset>
        </div>

    </div>
    <div class="row">
        <legend class="font-weight-semibold">PERSONAL DETAILS</legend>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'student_first_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'student_last_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'student_dob', ['inputOptions' => ['class' => 'student_dob form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">

                    <?=$form->field($model, 'student_gender', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($gender, ['prompt' => Yii::t('app', 'Select Gender')]);?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">


                    <?=$form->field($model, 'student_blood_group', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($bloodgroup, ['prompt' => Yii::t('app', 'Select Blood Group')]);?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'student_category_id', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($studentcategory, ['prompt' => Yii::t('app', 'Select Category')]
);?>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <legend class="font-weight-semibold">GUARDIAN DETAILS</legend>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($guardian, 'guardian_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($guardian, 'guardian_relation', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($guardian, 'guardian_email', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control', 'onChange' => '$.get( "' . Url::toRoute('/core/student/checksibling') . '", { email: $(this).val() } )
               .done(function( data ) {
             
                  $("#modal_h1").modal("show");
                  $.each(data.data, function(i, item) {
                    $(".modal_h1_content").append("<input type=\'checkbox\' name=\'vehicle1\' >");
                    $(".modal_h1_content").append(data.data[i]);
                    
                });
                
                  
               }
               );

               ', ],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">

        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($parent, 'father_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>

        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($parent, 'mother_name', ['inputOptions' => ['class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <legend class="font-weight-semibold">PREVIOUS QUALIFICATION DETAILS</legend>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($pq, 'qualification', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($pq, 'previousqualification_schoolname', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>


    </div>
    <div class="text-right">

        <?=Html::submitButton('Save <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary'])?>

    </div>
    <?php ActiveForm::end();?>
</div>



<div id="modal_h1" class="modal fade" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Siblings</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <div class="modal-body">
                <h6 class="font-weight-semibold">Link Guardian Email</h6>
                <p class="modal_h1_content"></p>

                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                <button type="button" class="btn bg-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>