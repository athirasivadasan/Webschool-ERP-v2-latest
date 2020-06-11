<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\core\models\EmployeeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employees';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">

    <!-- Breacrumb component -->
    <div
        class="breadcrumb-line breadcrumb-line-light bg-white breadcrumb-line-component header-elements-md-inline mb-4">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="<?=Yii::$app->request->baseUrl;?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                    <?=Yii::t('app', 'Home');?></a>
                <a href="" class="breadcrumb-item"><?=Yii::t('app', 'HR/Payroll');?></a>
                <a href="" class="breadcrumb-item"><?=Yii::t('app', 'Employee Management');?></a>
                <a href="<?php echo Url::to(['employee/index']); ?>"
                    class="breadcrumb-item"><?=Yii::t('app', 'Employee');?></a>
                <span class="breadcrumb-item active"><?=Yii::t('app', 'Employee List');?></span>
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
            <h5 class="card-title"><?=Yii::t('app', 'Employee List');?></h5>
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
        <?= $this->render('_searchdata', ['model' => $searchModel]) ?>


            <div class="card card-table table-responsive shadow-0 mb-0 index-card">
            <?php Pjax::begin(['id' => 'employee']) ?>
                <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn',
                'header' => 'Sl No',
                ],

                // 'employee_id',
                'employee_code',
                [
                    'attribute' => 'Name',
                    'value' => function ($data) {
                        return $data->employee_firstname . ' ' . $data->employee_middlename . ' ' . $data->employee_lastname;
                    },
                ],
                [
                    'attribute' => 'employee_designation',
                    'value' => function ($data) {
                        return isset($data->employee_designation) ? $data->employeeDesignation->designation_name : '';
                    },
                ],
                [
                    'attribute' => 'department_id',
                    'value' => function ($data) {
                        return isset($data->department_id) ? $data->department->department_name : '';
                    },
                ],
               
                // 'employee_firstname',
                // 'employee_middlename',
                // 'employee_lastname',                
                'employee_qualification',
               //'employee_dob',
                [
                    'attribute' => 'employee_joiningdate',
                    'value' => function ($data) {
                        return isset($data->employee_joiningdate) ? date("d-m-Y", strtotime($data->employee_joiningdate)) : '';
                    },
                ],
                //'employee_experience',
                //'employee_gender',
                //'department_id',
                //'employee_designation',
                //'institution_id',
                //'employee_type_id',
                //'idcard_issue_date',
                //'employee_joiningdate',
                //'status',
                //'withdrawdate',
                //'cardno',
                //'slug',
                //'created_at',
                //'updated_at',
                //'created_by',
                //'updated_by',

                // ['class' => 'yii\grid\ActionColumn'],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Manage',
            //'headerOptions' => ['style' => 'color:#337ab7'],
            'template' => '{view}{update}{delete}',
            'buttons' => [
                

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
               

                if ($action === 'update') {
                    $url = Url::to(['employee/update', 'id' => $model->slug]);
                    return $url;
                }
                if ($action === 'delete') {
                    $url = Url::to(['employee/delete', 'id' => $model->slug]);
                    return $url;
                }

            },
        ],
    ],
]);?>
<?php Pjax::end() ?>
            </div>
        </div>

    </div>

</div>