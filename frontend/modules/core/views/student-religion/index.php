<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\core\models\StudentReligionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Religions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-religion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student Religion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'student_religion_id',
            'student_religion_name',
            'status',
            'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
