<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\core\models\InstitutionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Institutions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="institution-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Institution', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'institution_id',
            'institution_name',
            'institution_contactperson',
            'institution_contactemail:email',
            'institution_phone',
            //'institution_address',
            //'institution_fax',
            //'institution_mobile',
            //'institution_created_on',
            //'institution_updated_on',
            //'institution_language',
            //'institution_timezone',
            //'institution_logo',
            //'institution_country',
            //'institution_currency_type',
            //'institution_liscencestatus',
            //'institution_groupid',
            //'institution_code',
            //'isautogeneration',
            //'institution_facebookurl',
            //'institution_youtubeurl',
            //'institution_twitterurl',
            //'institution_website',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
