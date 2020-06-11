<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\StudentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'student_id') ?>

    <?= $form->field($model, 'student_admission_no') ?>

    <?= $form->field($model, 'student_userid') ?>

    <?= $form->field($model, 'student_admission_date') ?>

    <?= $form->field($model, 'student_first_name') ?>

    <?php // echo $form->field($model, 'student_middle_name') ?>

    <?php // echo $form->field($model, 'student_last_name') ?>

    <?php // echo $form->field($model, 'student_dob') ?>

    <?php // echo $form->field($model, 'course_id') ?>

    <?php // echo $form->field($model, 'batch_id') ?>

    <?php // echo $form->field($model, 'student_gender') ?>

    <?php // echo $form->field($model, 'student_blood_group') ?>

    <?php // echo $form->field($model, 'student_birthplace') ?>

    <?php // echo $form->field($model, 'student_nationality') ?>

    <?php // echo $form->field($model, 'student_mothertoung') ?>

    <?php // echo $form->field($model, 'student_category_id') ?>

    <?php // echo $form->field($model, 'student_religion') ?>

    <?php // echo $form->field($model, 'student_caste') ?>

    <?php // echo $form->field($model, 'student_address1') ?>

    <?php // echo $form->field($model, 'student_address2') ?>

    <?php // echo $form->field($model, 'student_city') ?>

    <?php // echo $form->field($model, 'student_previous_qualification_id') ?>

    <?php // echo $form->field($model, 'student_state') ?>

    <?php // echo $form->field($model, 'student_pincode') ?>

    <?php // echo $form->field($model, 'student_country') ?>

    <?php // echo $form->field($model, 'student_phone') ?>

    <?php // echo $form->field($model, 'student_mobile') ?>

    <?php // echo $form->field($model, 'student_email') ?>

    <?php // echo $form->field($model, 'student_photo') ?>

    <?php // echo $form->field($model, 'institution_id') ?>

    <?php // echo $form->field($model, 'guardian_id') ?>

    <?php // echo $form->field($model, 'student_idcard_issue_date') ?>

    <?php // echo $form->field($model, 'student_rollno') ?>

    <?php // echo $form->field($model, 'student_aadhar') ?>

    <?php // echo $form->field($model, 'student_abilities') ?>

    <?php // echo $form->field($model, 'student_hobbies') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'academicyear') ?>

    <?php // echo $form->field($model, 'withdraw_date') ?>

    <?php // echo $form->field($model, 'academic_id') ?>

    <?php // echo $form->field($model, 'student_house_id') ?>

    <?php // echo $form->field($model, 'document_typeid') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
