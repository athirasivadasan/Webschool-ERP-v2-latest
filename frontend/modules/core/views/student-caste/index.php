<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\core\models\StudentCasteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Castes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-caste-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student Caste', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'studentcasteid',
            'student_caste_name',
            'status',
            'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
