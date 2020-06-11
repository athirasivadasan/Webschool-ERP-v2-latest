<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\core\models\BatchSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Batches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="batch-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Batch', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'batchid',
            'institutionid',
            'courseid',
            'batch_name',
            'batch_startdate',
            //'batch_enddate',
            //'max_no_of_students',
            //'venue',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
