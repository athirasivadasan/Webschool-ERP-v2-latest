<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Employee */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$this->registerJs("
 $(document).ready(function (e) {




     $('.employee_joiningdate').datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: \"linked\",
        clearBtn: true,
        daysOfWeekDisabled: \"0,7\",
        autoclose:true
    });
    $('.employee_dob').datepicker({
        format: 'dd/mm/yyyy',
        todayBtn: \"linked\",
        clearBtn: true,
        daysOfWeekDisabled: \"0,7\",
        autoclose:true
    });

     populateCountries('employeedetails-employeedetails_country1', 'employeedetails-employeedetails_state1');
     populateCountries('employeedetails-employeedetails_country2', 'employeedetails-employeedetails_state2');

 });

", \yii\web\VIEW::POS_READY);
?>
<div class="employee-form">

    <?php $form = ActiveForm::begin([
    'enableClientValidation' => true,
    'enableAjaxValidation' => true,
    'enableClientScript' => false,
    'options' => ['enctype' => 'multipart/form-data'],

]);?>

    <?php if (Yii::$app->session->hasFlash('add-emp-error')): ?>

    <div class="alert alert-danger border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <?=Yii::$app->session->getFlash('add-emp-error')?>
        <?= $form->errorSummary($model); ?>
        <?= $form->errorSummary($employee_detail); ?>
    </div>
    
    <?php endif;?>

    <?php if (Yii::$app->session->hasFlash('success')): ?>

    <div class="alert alert-success border-0 alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <?=Yii::$app->session->getFlash('success')?>
    </div>

    <?php endif;?>


    <div class="row">
        <legend class="font-weight-semibold"><?=Yii::t('app', 'EMPLOYEE DETAILS');?></legend>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'employee_code', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'employee_joiningdate', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'employee_joiningdate form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">

                    <?=$form->field($model, 'department_id', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($department, ['prompt' => 'Please Select']);?>
                </div>
            </fieldset>
        </div>
    </div>
    <!--  -->

    <div class="row">

        <div class="col-md-4">
            <fieldset>
                <div class="form-group">

                    <?=$form->field($model, 'employee_designation', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($designation, ['prompt' => 'Please Select']);?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'employee_qualification', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'employee_experience', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
    </div>
    <!--  -->
    <div class="row">

        <div class="col-md-4">
            <fieldset>
                <div class="form-group">

                    <?=$form->field($model, 'employee_type_id', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($usertype, ['prompt' => 'Please Select']);?>

                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($employee_detail, 'employeedetails_photo', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control h-auto'],
])->fileInput()->label('Upload Photo');?>
                </div>
            </fieldset>
        </div>

    </div>
    <!--  ****************************************  PERSONAL DETAILS ****************************************** -->

    <div class="row">
        <legend class="font-weight-semibold"><?=Yii::t('app', 'PERSONAL DETAILS');?></legend>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'employee_firstname', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'employee_middlename', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'employee_lastname', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
    </div>

    <!--  -->
    <div class="row">

        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'employee_dob', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'employee_dob form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">

                    <?=$form->field($model, 'employee_gender', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($gender, ['prompt' => 'Please Select']);?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($employee_detail, 'employeedetails_aadhar', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
    </div>

    <!--  -->
    <div class="row">

        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($employee_detail, 'employeedetails_pan', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($employee_detail, 'employeedetails_pf', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-4">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($employee_detail, 'employeedetails_esi', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
    </div>

    <!-- ************************************* CONTACT DETAILS ******************************** -->
    <div class="row">
        <legend class="font-weight-semibold"><?=Yii::t('app', 'CONTACT DETAILS');?></legend>
        <div class="col-md-6">
            <fieldset>
                <div class="form-group">

                    <?=$form->field($employee_detail, 'employeedetails_address1')->textarea(array('rows' => 2, 'cols' => 5, 'class' => 'form-control'));?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-6">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($model, 'is_copy')->checkbox(['label' => 'Is permanent address same as present address', 'class' => 'form-check-input',
    'onchange' => '

                                    var address = $( "#' . Html::getInputId($employee_detail, 'employeedetails_address1') . '" ).val();
                                    var city = $( "#' . Html::getInputId($employee_detail, 'employeedetails_city1') . '" ).val();
                                    var pincode = $( "#' . Html::getInputId($employee_detail, 'employeedetails_pincode1') . '" ).val();
                                    // var country = $( "#' . Html::getInputId($employee_detail, 'employeedetails_country1') . '" ).val();
                                    // var state = $( "#' . Html::getInputId($employee_detail, 'employeedetails_state1') . '" ).val();alert(state);



                                    if ($(this).prop("checked")) {
                                        $( "#' . Html::getInputId($employee_detail, 'employeedetails_address2') . '" ).val(address);
                                        $( "#' . Html::getInputId($employee_detail, 'employeedetails_city2') . '" ).val(city);
                                        $( "#' . Html::getInputId($employee_detail, 'employeedetails_pincode2') . '" ).val(pincode);
                                        // $( "#' . Html::getInputId($employee_detail, 'employeedetails_country2') . '" ).val(country);
                                        // $( "#' . Html::getInputId($employee_detail, 'employeedetails_state2') . '" ).val(state);
                                    }
                                    else {
                                        $( "#' . Html::getInputId($employee_detail, 'employeedetails_address2') . '" ).val("");
                                        $( "#' . Html::getInputId($employee_detail, 'employeedetails_city2') . '" ).val("");
                                        $( "#' . Html::getInputId($employee_detail, 'employeedetails_pincode2') . '" ).val("");
                                        // $( "#' . Html::getInputId($employee_detail, 'employeedetails_country2') . '" ).val("");
                                        // $( "#' . Html::getInputId($employee_detail, 'employeedetails_state2') . '" ).val("");

                                    }


                                    ', ]);?>
                    <?=$form->field($employee_detail, 'employeedetails_address2')->textarea(array('rows' => 2, 'cols' => 5, 'class' => 'form-control'));?>
                </div>
            </fieldset>
        </div>


    </div>
    <!--  -->
    <div class="row">

        <div class="col-md-3">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($employee_detail, 'employeedetails_city1', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-3">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($employee_detail, 'employeedetails_pincode1', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-3">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($employee_detail, 'employeedetails_city2', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-3">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($employee_detail, 'employeedetails_pincode2', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>

    </div>

    <!--  -->

    <div class="row">

        <div class="col-md-3">
            <fieldset>
                <div class="form-group">

                    <?=$form->field($employee_detail, 'employeedetails_country1', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList([], ['prompt' => 'Please Select']);?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-3">
            <fieldset>
                <div class="form-group">

                    <?=$form->field($employee_detail, 'employeedetails_state1', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList([], ['prompt' => 'Please Select']);?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-3">
            <fieldset>
                <div class="form-group">

                    <?=$form->field($employee_detail, 'employeedetails_country2', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList([], ['prompt' => 'Please Select']);?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-3">
            <fieldset>
                <div class="form-group">

                    <?=$form->field($employee_detail, 'employeedetails_state2', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList([], ['prompt' => 'Please Select']);?>
                </div>
            </fieldset>
        </div>


    </div>

    <!--  -->
    <div class="row">

        <div class="col-md-3">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($employee_detail, 'employeedetails_phone', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-3">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($employee_detail, 'employeedetails_mobile', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>
        <div class="col-md-3">
            <fieldset>
                <div class="form-group">
                    <?=$form->field($employee_detail, 'employeedetails_email', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                </div>
            </fieldset>
        </div>


    </div>

    <!--  -->
    <div class="text-right">
        <?=Html::submitButton('Save <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary'])?>

    </div>
    <?php ActiveForm::end();?>

</div>