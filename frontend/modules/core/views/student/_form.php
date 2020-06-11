<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\modules\core\models\DocumentType;
use frontend\modules\core\models\StudentDocuments;
/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$this->registerJs("
 $(document).ready(function (e) {

    $('.student_admission_date').datepicker({autoclose:true});
    $('.student_dob').datepicker({autoclose:true});

  
    $(document).on('click','.delete-file',function(e){
        e.preventDefault();
        var url = $(this).attr('data-href'); 
        var id = $(this).attr('data-id');      


        var formData = {id:id};

            $.ajax({
                type: 'POST',
                data : formData,
                url:url,
                success:function(data){
               location.reload();
               },
            });
            
            
        });
    
    

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
    'options' => ['enctype' => 'multipart/form-data'],

]);?>

    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs nav-justified">
                <li class="nav-item"><a href="#personal-tab1" class="nav-link active" data-toggle="tab"><i
                            class="icon-user"></i> Personal</a></li>
                <li class="nav-item"><a href="#contacts-tab2" class="nav-link" data-toggle="tab"><i
                            class="icon-attachment position-left"></i> Contacts</a></li>
                <li class="nav-item"><a href="#guardian-tab3" class="nav-link" data-toggle="tab"><i
                            class="icon-user-check"></i> Guardian</a></li>
                <li class="nav-item"><a href="#parents-tab4" class="nav-link" data-toggle="tab"><i
                            class="icon-users2"></i> Parents</a></li>
                <li class="nav-item"><a href="#health-tab5" class="nav-link" data-toggle="tab"><i
                            class="icon-heart5"></i> Health</a></li>
                <li class="nav-item"><a href="#pq-tab6" class="nav-link" data-toggle="tab"><i
                            class="icon-graduation position-left"></i> Previous Qualification</a></li>
                <li class="nav-item"><a href="#doc-tab7" class="nav-link" data-toggle="tab"><i
                            class="icon-graduation position-left"></i> Documents</a></li>

            </ul>

            <div class="tab-content">
                <!-- ****************************************************** Personal Information  : Start **************************************************************** -->
                <div class="tab-pane fade active show" id="personal-tab1">
                    <!--  -->
                    <div class="row">
                        <legend class="font-weight-semibold">Personal Information</legend>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_admission_no', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control','readonly' =>true],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_admission_date', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'student_admission_date form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
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
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'batch_id', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($batch, ['prompt' => Yii::t('app', 'Select Batch')]
);?>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!--  -->

                    <div class="row">
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_first_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_middle_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_last_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_dob', ['inputOptions' => ['class' => 'student_dob form-control'],
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
                                    <?=$form->field($model, 'student_gender', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($gender, ['prompt' => Yii::t('app', 'Select Gender')]);?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_blood_group', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($bloodgroup, ['prompt' => Yii::t('app', 'Select Blood Group')]);?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_birthplace', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_nationality', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
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
                                    <?=$form->field($model, 'student_rollno', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_mothertoung', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_religion', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($religion, ['prompt' => Yii::t('app', 'Select Religion')]);?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_caste', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($caste, ['prompt' => Yii::t('app', 'Select Caste')]);?>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!--  -->

                    <!--  -->
                    <div class="row">


                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_house_id', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($studenthouse, ['prompt' => Yii::t('app', 'Select House')]);?>
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-md-6">
                            <fieldset>
                                <div class="form-group">

                                    <?=$form->field($model, 'student_photo', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control h-auto'],
])->fileInput()->label('Upload Photo');?>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!--  -->



                </div>
                <!-- ****************************************************** Personal Information  : End **************************************************************** -->
                <!-- ****************************************************** Contact Details  : start **************************************************************** -->
                <div class="tab-pane fade" id="contacts-tab2">
                    <!--  -->
                    <div class="row">
                        <legend class="font-weight-semibold">Contact Details</legend>
                        <div class="col-md-6">
                            <fieldset>
                                <div class="form-group">

                                    <?=$form->field($model, 'student_address2')->textarea(array('rows' => 2, 'cols' => 5, 'placeholder' => "Permanent Address", 'class' => 'form-control'));?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <div class="form-group">


                                    <?=$form->field($model, 'is_copy')->checkbox(['label' => 'Is permanent address same as present address', 'class' => 'form-check-input',
                                    'onchange' => '

                                    var address = $( "#' . Html::getInputId($model, 'student_address2') . '" ).val();
                                    var city = $( "#' . Html::getInputId($model, 'student_city2') . '" ).val();
                                    var pincode = $( "#' . Html::getInputId($model, 'student_pincode2') . '" ).val();
                                    var country = $( "#' . Html::getInputId($model, 'student_country2') . '" ).val();
                                    var state = $( "#' . Html::getInputId($model, 'student_state2') . '" ).val();

                                    

                                    if ($(this).prop("checked")) {
                                        $( "#' . Html::getInputId($model, 'student_address1') . '" ).val(address);
                                        $( "#' . Html::getInputId($model, 'student_city1') . '" ).val(city);
                                        $( "#' . Html::getInputId($model, 'student_pincode1') . '" ).val(pincode);
                                        $( "#' . Html::getInputId($model, 'student_country1') . '" ).val(country);
                                        $( "#' . Html::getInputId($model, 'student_state1') . '" ).val(state);
                                    }
                                    else {
                                        $( "#' . Html::getInputId($model, 'student_address1') . '" ).val("");
                                        $( "#' . Html::getInputId($model, 'student_city1') . '" ).val("");
                                        $( "#' . Html::getInputId($model, 'student_pincode1') . '" ).val("");
                                        $( "#' . Html::getInputId($model, 'student_country1') . '" ).val("");
                                        $( "#' . Html::getInputId($model, 'student_state1') . '" ).val("");
                                        
                                    }

                                    
                                    ']);?>
                                    <?=$form->field($model, 'student_address1')->textarea(array('rows' => 2, 'cols' => 5, 'placeholder' => "Present Address", 'class' => 'form-control'));?>
                                </div>
                            </fieldset>
                        </div>

                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="row">

                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">


                                    <?=$form->field($model, 'student_city2', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">


                                    <?=$form->field($model, 'student_pincode2', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_city1', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>

                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_pincode1', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>

                                </div>
                            </fieldset>
                        </div>

                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="row">

                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">


                                    <?=$form->field($model, 'student_country2', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">


                                    <?=$form->field($model, 'student_state2', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_country1', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>

                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_state1', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>

                                </div>
                            </fieldset>
                        </div>

                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="row">

                        <div class="col-md-4">
                            <fieldset>
                                <div class="form-group">


                                    <?=$form->field($model, 'student_phone', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <fieldset>
                                <div class="form-group">


                                    <?=$form->field($model, 'student_mobile', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-4">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($model, 'student_email', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>

                                </div>
                            </fieldset>
                        </div>


                    </div>
                    <!--  -->
                </div>
                <!-- ****************************************************** Contact Details  : End **************************************************************** -->
                <!-- ****************************************************** Guardian Information : Start **************************************************************** -->
                <div class="tab-pane fade" id="guardian-tab3">
                    <!--  -->
                    <div class="row">
                        <legend class="font-weight-semibold">Guardian Information</legend>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($guardian, 'guardian_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($guardian, 'guardian_relation', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($guardian, 'guardian_email', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($guardian, 'guardian_mobile', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!--  -->

                    <!--  -->
                    <div class="row">
                       
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($guardian, 'guardian_education', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($guardian, 'guardian_occupation', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($guardian, 'guardian_income', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($guardian, 'guardian_phone', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!--  -->
                    <!--  -->
                     <div class="row">
                       
                       <div class="col-md-6">
                           <fieldset>
                               <div class="form-group">
                                  
                                <?=$form->field($guardian, 'guardian_address')->textarea(array('rows' => 2, 'cols' => 5, 'placeholder' => "Address", 'class' => 'form-control'));?>
                               </div>
                           </fieldset>
                       </div>
                       <div class="col-md-3">
                           <fieldset>
                               <div class="form-group">
                               <?=$form->field($guardian, 'guardian_city', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                               </div>
                           </fieldset>
                       </div>
                       <div class="col-md-3">
                           <fieldset>
                               <div class="form-group">
                               <?=$form->field($guardian, 'guardian_state', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                               </div>
                           </fieldset>
                       </div>
                       
                   </div>
                   <!--  -->
                   <!--  -->
                   <div class="row">
                      
                       <div class="col-md-3">
                           <fieldset>
                               <div class="form-group">
                               <?=$form->field($guardian, 'guardian_country', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                               </div>
                           </fieldset>
                       </div>
                   </div>
                   <!--  -->

                </div>
                <!-- ****************************************************** Guardian Information : End **************************************************************** -->
                <!-- ****************************************************** Parent's Information : Start **************************************************************** -->

                <div class="tab-pane fade" id="parents-tab4">
                    <!--  -->
                    <div class="row">
                        <legend class="font-weight-semibold">Parent's Information</legend>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($parent, 'father_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($parent, 'father_mobile', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($parent, 'father_job', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($parent, 'fa_aadhar_no', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!--  -->
                     <!--  -->
                     <div class="row">
                       
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($parent, 'mother_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($parent, 'mother_mobile', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($parent, 'mother_job', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($parent, 'ma_aadhar_no', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <!--  -->
                </div>
                <!-- ****************************************************** Parent's Information : End **************************************************************** -->
                <!-- ****************************************************** Health Record : Start **************************************************************** -->
                <div class="tab-pane fade" id="health-tab5">
                   <!--  -->
                   <div class="row">
                        <legend class="font-weight-semibold">Health Record</legend>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($healthdetails, 'complexion', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($healthdetails, 'identity', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($healthdetails, 'clinical_history', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($healthdetails, 'allergic_history', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
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
                                    <?=$form->field($healthdetails, 'weight', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($healthdetails, 'height', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        
                        
                       
                    </div>
                    <!--  -->
                    <!--  -->
                   <div class="row">
                        <legend class="font-weight-semibold">Emergency Details</legend>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($healthdetails, 'person_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-3">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($healthdetails, 'contact_no', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                                          
                        
                       
                    </div>
                    <!--  -->
                </div>
                <!-- ****************************************************** Health Record: End **************************************************************** -->
                <!-- ****************************************************** Previous Qualification : Start **************************************************************** -->
                <div class="tab-pane fade" id="pq-tab6">
                     <!--  -->
                     <div class="row">
                        <legend class="font-weight-semibold">Previous Qualification</legend>
                        <div class="col-md-6">
                            <fieldset>
                                <div class="form-group">
                                    <?=$form->field($pq, 'qualification', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset>
                                <div class="form-group">
                                <?=$form->field($pq, 'previousqualification_schoolname', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text');?>
                                </div>
                            </fieldset>
                        </div>
                        
                        
                       
                    </div>
                    <!--  -->
                    
                    <!--  -->
                    <div class="row">
                       
                        <div class="col-md-12">
                            <fieldset>
                                <div class="form-group">
                                
                                <?=$form->field($pq, 'previousqualification_address')->textarea(array('rows' => 3, 'cols' => 6, 'placeholder' => "Address", 'class' => 'form-control'));?>
                                </div>
                            </fieldset>
                        </div>
                       
                    </div>
                    <!--  -->
                </div>
                <!-- ****************************************************** Previous Qualification : End **************************************************************** -->
                <!-- ****************************************************** Documents : Start **************************************************************** -->
                <div class="tab-pane fade" id="doc-tab7">
                    <!--  -->
                    <div class="row">
                        <legend class="font-weight-semibold"><?=Yii::t('app', 'DOCUMENT SUBMITTED');?></legend>

                        <div class="col-md-12">
                            <fieldset>
                                <div class="form-check">

                                    <?php 
                                    $name = '';
                                    foreach ($documenttype as $key => $value ): 
                                        
                                        $submittedDoc = StudentDocuments::find()->where(['doc_type' => $key])->andWhere(['student_id' => $model->student_id])->one();
                                        $name = isset($submittedDoc->student_document_attachment) ? $submittedDoc->student_document_attachment : NULL;
                                        $checked = '';
                                        if($name){
                                            $checked = 'checked';
                                        }
                                        ?>

                                    <label class="form-check-label hide-class-label">
                                        <input type="checkbox" class="form-check-input document_item" <?= $checked?>
                                            value=<?= $key?>>
                                        <?= $value?>

                                    </label>
                                    <?php if($name){    ?>
                                    <?= $name?> <span class="delete-file"
                                        data-id="<?= $submittedDoc->student_document_id ?>"
                                        data-href="<?=  Url::to(['student/deletedoc'])?>"><i
                                            class="icon-trash"></i></span> <br><br>
                                    <?= $form->field($model, 'student_documents[]', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'student_documents_'.$key.''],
])->fileInput(['multiple' => true, 'accept' => 'image/*','hidden' =>true])->label(false);?>


                                    <?php }else{?>
                                    <span class="doc_file hide-class">
                                        <?= $form->field($model, 'student_documents[]', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'student_documents_'.$key.''],
])->fileInput(['multiple' => true, 'accept' => 'image/*'])->label(false);?></span> <br>
                                    <?php }?>
                                    <?php endforeach; ?>

                                </div>
                            </fieldset>

                        </div>




                    </div>
                    <!--  -->
                </div>
                <!-- ****************************************************** Documents : End **************************************************************** -->



            </div>
        </div>
    </div>

    <div class="text-right">

        <?=Html::submitButton('Save <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary'])?>
    </div>
    <?php ActiveForm::end();?>

</div>