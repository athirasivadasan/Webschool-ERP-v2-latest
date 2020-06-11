<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\PreviousQualification */

$this->title = 'Update Previous Qualification: ' . $model->previousqualification_id;
$this->params['breadcrumbs'][] = ['label' => 'Previous Qualifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->previousqualification_id, 'url' => ['view', 'id' => $model->previousqualification_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="previous-qualification-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
