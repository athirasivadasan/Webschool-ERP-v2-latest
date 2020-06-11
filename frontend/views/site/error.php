<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>

<div class="content">

    <!-- Breacrumb component -->
    <div
        class="breadcrumb-line breadcrumb-line-light bg-white breadcrumb-line-component header-elements-md-inline mb-4">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="<?=Yii::$app->request->baseUrl;?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>
                    <?=Yii::t('app', 'Home');?></a>
                <a href="" class="breadcrumb-item"><?=Yii::t('app', 'Error');?></a>
                <span class="breadcrumb-item active"><?=Yii::t('app', $name);?></span>
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

            <!-- Basic legend -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">
                        <?=Yii::t('app', $name);?>
                    </h5>
                    <div class="header-elements">
                        <div class="list-icons">

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="site-error">

                        <h1><?= Html::encode($this->title) ?></h1>

                        <div class="alert alert-danger">
                            <?= nl2br(Html::encode($message)) ?>
                        </div>

                        <p>
                            The above error occurred while the Web server was processing your request.
                        </p>
                        <p>
                            Please contact us if you think this is a server error. Thank you.
                        </p>

                    </div>
                </div>
            </div>
            <!-- /basic legend -->

        </div>


    </div>
</div>