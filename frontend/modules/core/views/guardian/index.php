<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\core\models\GuardianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Guardians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guardian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Guardian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'guardian_id',
            'guardian_name',
            'guardian_phone',
            'guardian_address',
            'guardian_city',
            //'guardian_state',
            //'guardian_country',
            //'guardian_email:email',
            //'guardian_photo',
            //'guardian_mobile',
            //'guardian_relation',
            //'guardian_education',
            //'guardian_occupation',
            //'guardian_income',
            //'status',
            //'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
