<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\bank\models\BankDetails */

$this->title = 'Update Bank Details: ' . $model->bank_id;
$this->params['breadcrumbs'][] = ['label' => 'Bank Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bank_id, 'url' => ['view', 'id' => $model->bank_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bank-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
