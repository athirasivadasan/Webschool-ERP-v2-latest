<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Guardian */

$this->title = 'Update Guardian: ' . $model->guardian_id;
$this->params['breadcrumbs'][] = ['label' => 'Guardians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->guardian_id, 'url' => ['view', 'id' => $model->guardian_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="guardian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
