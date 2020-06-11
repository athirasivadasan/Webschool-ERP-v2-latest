<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\SubjectAllocation */

$this->title = $model->subjectallocation_id;
$this->params['breadcrumbs'][] = ['label' => 'Subject Allocations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="subject-allocation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->subjectallocation_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->subjectallocation_id], [
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
            'subjectallocation_id',
            'course_id',
            'batch_id',
            'subject_id',
            'institution_id',
            'employee_id',
            'department_id',
            'academic_id',
            'slug',
        ],
    ]) ?>

</div>
