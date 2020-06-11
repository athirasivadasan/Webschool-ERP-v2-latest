<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\core\models\PreviousQualificationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Previous Qualifications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="previous-qualification-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Previous Qualification', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'previousqualification_id',
            'qualification',
            'previousqualification_schoolname',
            'previousqualification_address',
            'score',
            //'online_enquiryid',
            //'status',
            //'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
