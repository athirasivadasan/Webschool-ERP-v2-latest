<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Guardian */

$this->title = $model->guardian_id;
$this->params['breadcrumbs'][] = ['label' => 'Guardians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="guardian-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->guardian_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->guardian_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'guardian_id',
            'guardian_name',
            'guardian_phone',
            'guardian_address',
            'guardian_city',
            'guardian_state',
            'guardian_country',
            'guardian_email:email',
            'guardian_photo',
            'guardian_mobile',
            'guardian_relation',
            'guardian_education',
            'guardian_occupation',
            'guardian_income',
            'status',
            'slug',
        ],
    ]) ?>

</div>
