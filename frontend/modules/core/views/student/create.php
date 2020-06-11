<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Student */

$this->title = 'Create Student';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="content">

    <!-- Breacrumb component -->
    <div
        class="breadcrumb-line breadcrumb-line-light bg-white breadcrumb-line-component header-elements-md-inline mb-4">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="<?=Yii::$app->request->baseUrl;?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                    <?=Yii::t('app', 'Home');?></a>
                <a href="<?php echo Url::to(['student/create']); ?>"
                    class="breadcrumb-item"><?=Yii::t('app', 'Student');?></a>
                <span class="breadcrumb-item active"><?=Yii::t('app', 'Student Admission');?></span>
            </div>
            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>
        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="breadcrumb-elements-item">
                    <i class="icon-comment-discussion mr-2"></i>
                    <?=Yii::t('app', 'Support');?>
                </a>
            </div>
        </div>
    </div>
    <!-- /breacrumb component -->

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">Student Admission</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <!-- <a class="list-icons-item" data-action="collapse"></a> -->
                    <a class="list-icons-item" data-action="reload"></a>
                    <!-- <a class="list-icons-item" data-action="remove"></a> -->
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="card">
                <div class="card-body">
                <?= $this->render('_createform', [
        'model' => $model,'guardian' =>$guardian, 'parent' => $parent,'pq' => $pq,
        'academiclist' => $academiclist,'courses' => $courses,'studentcategory' => $studentcategory,'bloodgroup' => $bloodgroup,'gender' => $gender
    ]) ?>
                </div>


            </div>
            
        </div>


    </div>
</div>