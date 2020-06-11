<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\AssignSubject */

$this->title = 'Update Assign Subject: ' . $model->assign_subject_id;
$this->params['breadcrumbs'][] = ['label' => 'Assign Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->assign_subject_id, 'url' => ['view', 'id' => $model->assign_subject_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="assign-subject-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
