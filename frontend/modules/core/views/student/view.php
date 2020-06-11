<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\Student */

$this->title = $model->student_id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="content">

    <!-- Breacrumb component -->
    <div
        class="breadcrumb-line breadcrumb-line-light bg-white breadcrumb-line-component header-elements-md-inline mb-4">
        <div class="d-flex">
            <div class="breadcrumb">

                <a href="<?= Yii::$app->request->baseUrl; ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                    <?=Yii::t('app', 'Home');?></a>
                <a href="<?php echo Url::to(['student/create']); ?>"
                    class="breadcrumb-item"><?=Yii::t('app', 'Student');?></a>
                <span class="breadcrumb-item active"><?=Yii::t('app', 'View');?></span>
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
        <div class="card-body bg-blue text-center card-img-top student-view">
            <div class="card-img-actions d-inline-block mb-3">
                <?php if (isset($model->student_photo)) {
                            $logo = Yii::$app->request->baseUrl . '/frontend/web/uploads/user/' . $model->student_photo;

                        } else {
                            $logo = Yii::$app->request->baseUrl . '/frontend/web/images/default_user.jpg';
                        }?>
                
                <img class="img-fluid rounded-circle" src="<?=$logo?>" alt=""
                    width="170" height="170">
                <div class="card-img-actions-overlay card-img rounded-circle">
                    <a href="#"
                        class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                        <i class="icon-plus3"></i>
                    </a>
                    <a href="user_pages_profile.html"
                        class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                        <i class="icon-link"></i>
                    </a>
                </div>
            </div>

            <h6 class="font-weight-semibold mb-0"><?= ucfirst($model->student_first_name).' '.ucfirst($model->student_middle_name).' '.ucfirst($model->student_last_name);?></h6>
            <span class="d-block opacity-75"></span>

            <ul class="list-inline list-inline-condensed mt-3 mb-0">
                <li class="list-inline-item">
                    <a href="#"
                        class="btn btn-outline bg-white btn-icon text-white border-white border-2 rounded-round">
                        <i class="icon-google-drive"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#"
                        class="btn btn-outline bg-white btn-icon text-white border-white border-2 rounded-round">
                        <i class="icon-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="#"
                        class="btn btn-outline bg-white btn-icon text-white border-white border-2 rounded-round">
                        <i class="icon-github"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div class="card-body border-top-0">
            <div class="d-sm-flex flex-sm-wrap mb-3">
                <div class="font-weight-semibold"><?=Yii::t('app', 'Full Name');?></div>
                <div class="ml-sm-auto mt-2 mt-sm-0">
                    <?= ucfirst($model->student_first_name).' '.ucfirst($model->student_middle_name).' '.ucfirst($model->student_last_name);?>
                </div>
            </div>

            <div class="d-sm-flex flex-sm-wrap mb-3">
                <div class="font-weight-semibold"><?=Yii::t('app', 'Admission Number');?></div>
                <div class="ml-sm-auto mt-2 mt-sm-0"><?= $model->student_admission_no ?></div>
            </div>

            <div class="d-sm-flex flex-sm-wrap mb-3">
                <div class="font-weight-semibold"><?=Yii::t('app', 'Admission Number');?></div>
                <div class="ml-sm-auto mt-2 mt-sm-0"><?= $model->student_admission_no ?></div>
            </div>

            <div class="d-sm-flex flex-sm-wrap">
                <div class="font-weight-semibold"><?=Yii::t('app', 'Admission Number');?></div>
                <div class="ml-sm-auto mt-2 mt-sm-0"><?= $model->student_admission_no ?></div>
            </div>
        </div>
    </div>

</div>



