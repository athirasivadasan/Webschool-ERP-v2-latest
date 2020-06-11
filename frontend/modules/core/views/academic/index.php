<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\core\models\AcademicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Academics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academic-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Academic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'academicid',
            'academic_startyear',
            'academic_endyear',
            'status',
            'academic_startmonth',
            //'academic_endmonth',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
