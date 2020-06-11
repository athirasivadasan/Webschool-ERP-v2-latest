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
                <legend class="font-weight-semibold text-uppercase font-size-sm">
                <?php echo $model->isNewRecord ? Yii::t('app', 'Add Subject Allocation') : Yii::t('app', 'Update Subject Allocation')?></legend>

                <div class="list-employee-bank-details-form">
                    <?=$this->render('_form', ['model' => $model,'department' => $department,'course' => $course,
                    'batch'=> $batch,'employee'=>$employee,'subject' =>$subject])?>


                </div>
            </div>

            <div class="col-md-6">
            <?= $this->render('_searchdata', ['model' => $searchModel]) ?>
                <div class="card card-table table-responsive shadow-0 mb-0 index-card">
                
                
                    <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => '{items}{pager}',
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn',
                        'header' => 'Sl No',],
                        [
                            'attribute' => 'department_id',
                            'value' => function($data) {
                                return isset($data->department_id) ? $data->department->department_name : '';
                            },
                        ],
                        [
                            'attribute' => 'employee_id',
                            'value' => function($data) {
                                if(isset($data->employee_id)){
                                    $name = $data->employee->employee_firstname . " " . $data->employee->employee_middlename . " " . $data->employee->employee_lastname;
                                }
                               
                                return isset($data->employee_id) ? $name : '';
                            },
                        ],
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
                        // 'subjectallocation_id',
                        // 'course_id',
                        // 'batch_id',
                        // 'subject_id',
                        // 'institution_id',
                        //'employee_id',
                        //'department_id',
                        //'academic_id',
                        //'slug',
                        [
                            'class' => 'yii\grid\ActionColumn',
                            'header' => 'Manage',
                            // 'headerOptions' => ['style' => 'color:#337ab7'],
                            'template' => '{update}{delete}',
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
                              }
                  
                            ],
                            'urlCreator' => function ($action, $model, $key, $index) {
                            
                  
                              if ($action === 'update') {
                                $url = Url::to(['subject-allocation/update', 'id' => $model->slug]);
                                return $url;
                              }
                              if ($action === 'delete') {
                                $url = Url::to(['subject-allocation/delete', 'id' => $model->slug]);
                                return $url;
                              }
                  
                            }
                            ],
                    ],
                ]);
?>
                </div>
            </div>
        </div>


    </div>

</div>