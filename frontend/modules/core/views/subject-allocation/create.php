<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\modules\core\models\SubjectAllocation */

$this->title = 'Create Subject Allocation';
$this->params['breadcrumbs'][] = ['label' => 'Subject Allocations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$this->registerJs("
 $(document).ready(function (e) {
    $('a[data-toggle=\"tab\"]').on('shown.bs.tab', function (e) {
        // save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', $(this).attr('href'));
    });

    // go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
        $('[href=\"' + lastTab + '\"]').tab('show');
    }


});
", \yii\web\VIEW::POS_READY);
?>
<div class="content">
    <div
        class="breadcrumb-line breadcrumb-line-light bg-white breadcrumb-line-component header-elements-md-inline mb-4">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="<?= Yii::$app->request->baseUrl; ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                    <?=Yii::t('app', 'Home');?></a>
                <a href="" class="breadcrumb-item"><?=Yii::t('app', 'Academic');?></a>
                <a href="<?php echo Url::to(['subject-allocation/create']); ?>"
                    class="breadcrumb-item"><?=Yii::t('app', 'Subjects');?></a>
                <span class="breadcrumb-item active"><?=Yii::t('app', 'Subject Allocation');?></span>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h6 class="card-title"><?=Yii::t('app', 'Subject Allocation');?></h6>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                            <a class="list-icons-item" data-action="reload"></a>
                            <!-- <a class="list-icons-item" data-action="remove"></a> -->
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-highlight">
                        <li class="nav-item">
                            <a href="#icon-only-tab1" class="nav-link active"
                                data-toggle="tab"><?=Yii::t('app', 'Subject Allocation');?></a>
                        </li>

                        <li class="nav-item">
                            <a href="#icon-only-tab2" class="nav-link"
                                data-toggle="tab"><?=Yii::t('app', 'Manage');?></a>
                        </li>

                        <li class="nav-item">
                            <a href="#icon-only-tab3" class="nav-link"
                                data-toggle="tab"><?=Yii::t('app', 'Report');?></a>
                        </li>


                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="icon-only-tab1">
                        <?=$this->render('_allocation', ['model' => $model,'dataProvider' => $dataProvider,'department' => $department,'course' => $course,
                        'searchModel' =>$searchModel,'batch'=> $batch,'employee'=>$employee,'subject' =>$subject])?>
                        </div>

                        <div class="tab-pane fade" id="icon-only-tab2">

                        </div>
                        <div class="tab-pane fade" id="icon-only-tab3">

                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>

</div>