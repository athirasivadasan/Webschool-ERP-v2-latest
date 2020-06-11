<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\bank\models\EmployeeBankDetails */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="card">
   
    <div class="card-body">
    
        <div class="row">
            <div class="col-md-6">
            <legend class="font-weight-semibold text-uppercase font-size-sm"><?= Yii::t('app', 'Bank Details')?></legend>

                <div class="list-employee-bank-details-form">

                    <fieldset>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Designation</label>
                            <div class="col-lg-9">

                                <?= Html::dropDownList('designation', 'designation',$designation,
            ['class' => 'form-control','prompt' => 'Please Select','onChange' => '$.get( "' . Url::toRoute('/bank/employee-bank-details/getemployee') . '", { id: $(this).val() } )
            .done(function( data ) {
                
                $( "#list-employee").html( data );
            }
            );

            ']) ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label"> Employee Name </label>
                            <div class="col-lg-9">

                                <?= Html::dropDownList('employee', 'employee',[],
            ['class' => 'form-control','prompt' => 'Please Select','id' => 'list-employee','onChange' => '$.get( "' . Url::toRoute('/bank/employee-bank-details/listempbankdetails') . '", { id: $(this).val() } )
            .done(function( data ) {
                $( "#employee-bank-details-table tbody").html( data );
                $(".employee-bank-details").removeClass("hide");
            }
            );

            ']) ?>
                            </div>
                        </div>

                    </fieldset>

                </div>
            </div>
            
            <div class="col-md-6">
                <div class="employee-bank-details hide">
                <legend class="font-weight-semibold text-uppercase font-size-sm"><?= Yii::t('app', 'Employee Bank Details')?></legend>
                    <table id="employee-bank-details-table" class="table table-borderless">
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

</div>