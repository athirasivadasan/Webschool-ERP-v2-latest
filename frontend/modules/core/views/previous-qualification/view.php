<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\PreviousQualification */

$this->title = $model->previousqualification_id;
$this->params['breadcrumbs'][] = ['label' => 'Previous Qualifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="previous-qualification-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->previousqualification_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->previousqualification_id], [
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
            'previousqualification_id',
            'qualification',
            'previousqualification_schoolname',
            'previousqualification_address',
            'score',
            'online_enquiryid',
            'status',
            'slug',
        ],
    ]) ?>

</div>
