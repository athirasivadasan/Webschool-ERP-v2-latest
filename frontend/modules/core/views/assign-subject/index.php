<?php


use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\core\models\AssignSubjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assign Subjects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">

    <!-- Breacrumb component -->
    <div
        class="breadcrumb-line breadcrumb-line-light bg-white breadcrumb-line-component header-elements-md-inline mb-4">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="<?= Yii::$app->request->baseUrl; ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                    <?=Yii::t('app', 'Home');?></a>
                <a href="" class="breadcrumb-item"><?=Yii::t('app', 'Academic');?></a>
                <a href="<?php echo Url::to(['assign-subject/create']); ?>"
                    class="breadcrumb-item"><?=Yii::t('app', 'Subjects');?></a>
                <span class="breadcrumb-item active"><?=Yii::t('app', 'Assign Subject');?></span>
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
            <h5 class="card-title"><?=Yii::t('app', 'Assigned Subjects');?></h5>
            <div class="header-elements">
                <div class="list-icons">
                    <!-- <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a> -->
                </div>
            </div>
        </div>
        <div class="card-body">

        <?= $this->render('_searchdata', ['model' => $searchModel,'courses' => $courses,]) ?>
            <div class="card card-table table-responsive shadow-0 mb-0 index-card">
                <?php Pjax::begin(['id' => 'employee']) ?>
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn',
                        'header' => 'Sl No',],
                        // 'assign_subject_id',
                        
                        // 'course_id',
                        [
                            'attribute' => 'course_id',
                            'value' => function($data) {
                                return isset($data->course_id) ? $data->course->course_name : '';
                            },
                        ],
                        [
                            'attribute' => 'batch_id',
                            'value' => function($data) {
                                return isset($data->batch_id) ? $data->batch->batch_name : '';
                            },
                        ],
                        [
                            'attribute' => 'subject_id',
                            'value' => function($data) {
                                return isset($data->subject_id) ? $data->subject->subject_name : '';
                            },
                        ],
                        // 'batch_id',
                        // 'subject_id',
                        // 'institution_id',
                        //'ccesubjectgroup',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Manage',
                            // 'headerOptions' => ['style' => 'color:#337ab7'],
                            'template' => '{delete}',
                            'buttons' => [
                              
                              'delete' => function ($url, $model) {
                                  return Html::a('<span class="icon-cross2"></span>', $url, [
                                              'title' => Yii::t('app', 'delete'),
                                  ]);
                              }
                  
                            ],
                            'urlCreator' => function ($action, $model, $key, $index) {
                            
                  
                            
                              if ($action === 'delete') {
                                $url = Url::to(['assign-subject/delete', 'id' => $model->assign_subject_id]);
                                return $url;
                              }
                  
                            }
                            ],
                    ],
                ]);
?>
                <?php Pjax::end() ?>
            </div>
        </div>

    </div>

</div>