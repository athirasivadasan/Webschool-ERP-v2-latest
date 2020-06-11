<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\PreviousQualification */

$this->title = 'Create Previous Qualification';
$this->params['breadcrumbs'][] = ['label' => 'Previous Qualifications', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="previous-qualification-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
