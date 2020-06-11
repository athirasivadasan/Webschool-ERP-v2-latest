<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\bank\models\EmployeeBankDetails */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="card">

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">
                <legend class="font-weight-semibold text-uppercase font-size-sm"><?= Yii::t('app', 'List All')?>
                </legend>

                <div class="list-employee-bank-details-form">



                    <fieldset>


                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Department</label>
                            <div class="col-lg-9">


                                <?= Html::dropDownList('department', 'department',$department,
            ['class' => 'form-control','prompt' => 'Please Select','id' => 'list-employee','onChange' => '$.get( "' . Url::toRoute('/bank/employee-bank-details/listallbankdetails') . '", { id: $(this).val() } )
            .done(function( data ) {
                $( "#all-bank-details-table tbody").html( data );
                $(".all-bank-details").removeClass("hide");
            }
            );

            ']) ?>

                            </div>
                        </div>



                    </fieldset>



                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="all-bank-details hide">
                    <legend class="font-weight-semibold text-uppercase font-size-sm">
                        <?= Yii::t('app', 'List All Details')?></legend>
                    <table id="all-bank-details-table" class="table">
                        <thead>
                            <tr>
                                <th>Employee Code</th>
                                <th>Employee Name</th>
                                <th>Bank Name</th>
                                <th>Branch</th>                                
                                <th>Account Number</th>
                                <th>IFSC Code</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>


    </div>

</div>