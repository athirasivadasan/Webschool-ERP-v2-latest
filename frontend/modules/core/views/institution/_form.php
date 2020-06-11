<?php
use Yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Institution */
/* @var $form yii\widgets\ActiveForm */
?>




<?php /*
$this->registerJsFile('@frontend/web/themes/js/timezone/moment.min.js',['position' => \yii\web\View::POS_END]);
$this->registerJsFile('@frontend/web/themes/js/timezone/moment-timezone-with-data.js',['position' => \yii\web\View::POS_END]);
$this->registerJsFile('@frontend/web/themes/js/timezone/bootstrap-select.min.js',['position' => \yii\web\View::POS_END]);*/?>

<?php
$this->registerJs("
 $(document).ready(function (e) {

   var timezone = moment.tz.names();
   var offsetTmz=[];
   var timezoneval = '" .  $model->institution_timezone . "';
   for (var i = 0; i < timezone.length; i++) {
      offsetTmz.push(\" (GMT\"+moment.tz(timezone[i]).format('Z')+\")\" +  timezone[i]);
      if(timezoneval == timezone[i] ){
        $('select.institution_timezone').append('<option  selected value=\"' + timezone[i] + '\">' + offsetTmz[i] + '</option>');
      }else{
        $('select.institution_timezone').append('<option  value=\"' + timezone[i] + '\">' + offsetTmz[i] + '</option>');
      }

    }


 });

", \yii\web\VIEW::POS_READY);
?>




<?php $form = ActiveForm::begin([
    'enableClientValidation' => true,
    'enableAjaxValidation' => true,
    'enableClientScript' => false,
    'options' => ['enctype'=>'multipart/form-data']

]);?>
<div class="row">
    <legend class="font-weight-semibold">Profile information</legend>
    <div class="col-md-6">
        <fieldset>
            <div class="form-group">
                <?=$form->field($model, 'institution_name', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text', ['placeholder' => " Institution Name "]);?>
            </div>
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset>
            <div class="form-group">
                <?=$form->field($model, 'institution_address')->textarea(array('rows' => 2, 'cols' => 5, 'placeholder' => "Institution Address", 'class' => 'form-control'));?>
            </div>
        </fieldset>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <fieldset>
            <div class="form-group">
                <?=$form->field($model, 'institution_contactemail', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('email', ['placeholder' => " Institution Email "])->label('Institution Email');?>
            </div>
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset>
            <div class="form-group">
                <?=$form->field($model, 'institution_phone', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text', ['placeholder' => "  Institution Phone  "])->label(' Institution Phone ');?>
            </div>
        </fieldset>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <fieldset>
            <div class="form-group">
                <?=$form->field($model, 'institution_mobile', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text', ['placeholder' => "  Institution Mobile  "])->label(' Institution Mobile ');?>
            </div>
        </fieldset>
    </div>
    <div class="col-md-4">
        <fieldset>
            <div class="form-group">
                <?=$form->field($model, 'institution_fax', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text', ['placeholder' => "   Institution Fax   "])->label(' Institution Fax ');?>
            </div>
        </fieldset>
    </div>
    <div class="col-md-4">
        <fieldset>
            <div class="form-group">
                <?=$form->field($model, 'institution_contactperson', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text', ['placeholder' => "   Admin Contact Person   "])->label('  Admin Contact Person  ');?>
            </div>
        </fieldset>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <fieldset>
            <div class="form-group">
                <?=$form->field($model, 'institution_country', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->dropDownList($country, ['prompt' => 'Please Select','onChange' => '$.get( "'.Url::toRoute('/core/institution/countrycode').'", { id: $(this).val() } )
.done(function( data ) {
    $( "#'.Html::getInputId($model, 'institution_currency_type').'" ).html( data );
}
);

', ])->label('Country');?>

            </div>
        </fieldset>
    </div>
    <div class="col-md-4">
        <fieldset>
            <div class="form-group">

                <?= $form->field($model, 'institution_currency_type', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'institution_currency_type form-control'],
])->dropDownList($currency, ['prompt' => 'Please Select'])->label(' Currency Type ');?>
            </div>
        </fieldset>
    </div>
    <div class="col-md-4">
        <fieldset>
            <div class="form-group">
                <?=$form->field($model, 'institution_language', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text', ['placeholder' => "  Language  "])->label('Language');?>
            </div>
        </fieldset>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <fieldset>
            <div class="form-group">
                <div class="form-check">
                    <?=$form->field($model, 'isautogeneration')->checkbox(array('label' => 'Institution code(This code will be used as the prefix for student admission number)', 'class' => 'form-check-input'));?>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset>
            <div class="form-group">
                <?=$form->field($model, 'institution_code', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text', ['placeholder' => "  Institution Code  "])->label(' Institution Code ');?>
            </div>
        </fieldset>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <fieldset>
            <div class="form-group">

                <?=$form->field($model, 'institution_timezone', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'institution_timezone form-control'],
])->dropDownList(
    [], ['prompt' => 'Please Select']
)->label('Timezone');?>

            </div>
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset>
            <div class="form-group">

                <?=$form->field($model, 'institution_logo', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control h-auto'],
])->fileInput()->label('Upload Logo');?>

            </div>
        </fieldset>
    </div>
</div>
<div class="row">
    <legend class="font-weight-semibold">Social Links</legend>
    <div class="col-md-4">
        <fieldset>
            <div class="form-group">
                <?=$form->field($model, 'institution_facebookurl', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text', ['placeholder' => "Facebook"])->label(' Facebook');?>
            </div>
        </fieldset>
    </div>
    <div class="col-md-4">
        <fieldset>
            <div class="form-group">
                <?=$form->field($model, 'institution_youtubeurl', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text', ['placeholder' => "Youtube"])->label('Youtube');?>
            </div>
        </fieldset>
    </div>
    <div class="col-md-4">
        <fieldset>
            <div class="form-group">
                <?=$form->field($model, 'institution_twitterurl', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control'],
])->textInput()->input('text', ['placeholder' => "Twitter"])->label('Twitter');?>
            </div>
        </fieldset>
    </div>
</div>
<div class="text-right">
    <!-- <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button> -->
    <?=Html::submitButton('Save <i class="icon-paperplane ml-2"></i>', ['class' => 'btn btn-primary'])?>

</div>
<?php ActiveForm::end();?>