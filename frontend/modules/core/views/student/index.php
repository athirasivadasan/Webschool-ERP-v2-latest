<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\core\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$this->registerJs("
 $(document).ready(function (e) {

});
", \yii\web\VIEW::POS_READY);
?>

<div class="content">

    <!-- Breacrumb component -->
    <div
        class="breadcrumb-line breadcrumb-line-light bg-white breadcrumb-line-component header-elements-md-inline mb-4">
        <div class="d-flex">
            <div class="breadcrumb">

                <a href="<?=Yii::$app->request->baseUrl;?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                    <?=Yii::t('app', 'Home');?></a>
                <a href="<?php echo Url::to(['student/index']); ?>"
                    class="breadcrumb-item"><?=Yii::t('app', 'Student');?></a>
                <span class="breadcrumb-item active"><?=Yii::t('app', 'Student List');?></span>
            </div>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item">
                    <i class="icon-comment-discussion mr-2"></i>
                    <?=Yii::t('app', 'Support');?>
                </a>
            </div>
        </div>
    </div>
    <!-- /breacrumb component -->



    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"><?=Yii::t('app', 'Student List');?></h5>
            <div class="header-elements">
                <div class="list-icons">
                    <!-- <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="reload"></a>
                        <a class="list-icons-item" data-action="remove"></a> -->
                    <a class="list-icons-item" data-action="reload"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php echo  $this->render('_searchdata', ['model' => $searchModel,'courses' => $courses]) ?>


            <div class="card card-table table-responsive shadow-0 mb-0">

                <?=GridView::widget([
    'dataProvider' => $dataProvider,
    // 'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        //'student_id',
        'student_admission_no',
        // 'student_userid',
        // 'student_admission_date',
        [
            'attribute' => 'student_admission_date',
            'value' => function ($data) {
                return isset($data->student_admission_date) ? date("d-m-Y", strtotime($data->student_admission_date)) : '';
            },
        ],
        'student_first_name',
        'student_middle_name',
        'student_last_name',
        // 'student_dob',
        // 'course_id',
        [
            'attribute' => 'course_id',
            'value' => function ($data) {
                return isset($data->course_id) ? $data->course->course_name : '';
            },
        ],
        // 'batch_id',
        [
            'attribute' => 'batch_id',
            'value' => function ($data) {
                return isset($data->batch_id) ? $data->batch->batch_name : '';
            },
        ],
        // 'student_gender',
        [
            'attribute' => 'student_gender',
            'value' => function ($data) {
                return isset($data->student_gender) ? $data->studentGender->gender : '';
            },
        ],
        //'student_blood_group',
        //'student_birthplace',
        //'student_nationality',
        //'student_mothertoung',
        //'student_category_id',
        //'student_religion',
        //'student_caste',
        //'student_address1',
        //'student_address2',
        //'student_city',
        //'student_previous_qualification_id',
        //'student_state',
        //'student_pincode',
        //'student_country',
        //'student_phone',
        //'student_mobile',
        //'student_email:email',
        //'student_photo',
        //'institution_id',
        //'guardian_id',
        //'student_idcard_issue_date',
        //'student_rollno',
        //'student_aadhar',
        //'student_abilities',
        //'student_hobbies',
        //'status',
        //'withdraw_date',
        //'academic_id',
        //'student_house_id',
        //'document_typeid',
        //'slug',

        // ['class' => 'yii\grid\ActionColumn'],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Actions',
            'headerOptions' => ['style' => 'color:#337ab7'],
            'template' => '{view}{update}{delete}',
            'buttons' => [
                'view' => function ($url, $model) {
                    return Html::a('<span class="icon-eye"></span>', $url, [
                        'title' => Yii::t('app', 'view'),
                    ]);
                },

                'update' => function ($url, $model) {
                    return Html::a('<span class="icon-pencil"></span>', $url, [
                        'title' => Yii::t('app', 'update'),
                    ]);
                },
                'delete' => function ($url, $model) {
                    return Html::a('<span class="icon-cross2"></span>', $url, [
                        'title' => Yii::t('app', 'delete'),
                    ]);
                },

            ],
            'urlCreator' => function ($action, $model, $key, $index) {
                if ($action === 'view') {
                    $url = Url::to(['student/view', 'id' => $model->slug]);
                    return $url;
                }

                if ($action === 'update') {
                    $url = Url::to(['student/update', 'id' => $model->slug]);
                    return $url;
                }
                if ($action === 'delete') {
                    $url = Url::to(['student/delete', 'id' => $model->slug]);
                    return $url;
                }

            },
        ],
    ],
]);?>
            </div>
        </div>

    </div>

</div>