<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\bank\models\BankDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bank Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-details-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bank Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bank_id',
            'bank_name',
            'status',
            'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
