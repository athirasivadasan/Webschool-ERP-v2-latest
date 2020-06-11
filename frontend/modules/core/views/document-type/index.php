<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\core\models\DocumentTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Document Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Document Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'document_type_id',
            'document_name',
            'status',
            'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
