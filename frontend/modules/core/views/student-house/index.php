<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\core\models\StudentHouseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Houses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-house-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student House', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'student_house_id',
            'student_house_name',
            'status',
            'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
