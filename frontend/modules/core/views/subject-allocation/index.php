<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\core\models\SubjectAllocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subject Allocations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-allocation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Subject Allocation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'subjectallocation_id',
            'course_id',
            'batch_id',
            'subject_id',
            'institution_id',
            //'employee_id',
            //'department_id',
            //'academic_id',
            //'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
