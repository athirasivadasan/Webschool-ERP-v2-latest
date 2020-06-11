<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\DashboardAsset;
use frontend\modules\core\controllers\MenuController;
use yii\helpers\Html;
use yii\helpers\Url;
use frontend\modules\core\models\Institution;

DashboardAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">

<head>
    <meta charset="<?=Yii::$app->charset?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags()?>
    <title><?=Html::encode($this->title)?></title>
    <?php $this->head()?>
</head>

<body>
    <?php $this->beginBody()?>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-light">

        <!-- Header with logos -->
        <div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center">
            <div class="navbar-brand navbar-brand-md">
                <a href="<?= Yii::$app->request->baseUrl?>" class="d-inline-block">
                    <img src="<?= Yii::$app->request->baseUrl . '/frontend/web/images/logo-1t.png'?>" alt="">
                </a>
            </div>

            <div class="navbar-brand navbar-brand-xs">
                <a href="<?= Yii::$app->request->baseUrl?>" class="d-inline-block">
                    <!-- <img src="<?= Yii::$app->request->baseUrl . '/frontend/web/images/logo-1t.png'?>" alt=""> -->
                </a>
            </div>
        </div>
        <!-- /header with logos -->


        <!-- Mobile controls -->
        <div class="d-flex flex-1 d-md-none">
            <div class="navbar-brand mr-auto">
                <a href="<?= Yii::$app->request->baseUrl?>" class="d-inline-block">
                    <img src="<?= Yii::$app->request->baseUrl . '/frontend/web/images/logo-1t.png'?>" alt="">
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>

            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="icon-paragraph-justify3"></i>
            </button>
        </div>
        <!-- /mobile controls -->


        <!-- Navbar content -->
        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                        <i class="icon-paragraph-justify3"></i>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                        <i class="icon-people"></i>
                        <span class="d-md-none ml-2">Users</span>
                        <span class="badge badge-mark border-pink-400 ml-auto ml-md-0"></span>
                    </a>

                    <div class="dropdown-menu dropdown-content wmin-md-300">
                        <div class="dropdown-content-header">
                            <span class="font-weight-semibold">Users online</span>
                            <a href="#" class="text-default"><i class="icon-search4 font-size-base"></i></a>
                        </div>

                        <div class="dropdown-content-body dropdown-scrollable">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                            width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Jordana Ansley</a>
                                        <span class="d-block text-muted font-size-sm">Lead web developer</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span
                                            class="badge badge-mark border-success"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                            width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Will Brason</a>
                                        <span class="d-block text-muted font-size-sm">Marketing manager</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span
                                            class="badge badge-mark border-danger"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                            width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Hanna Walden</a>
                                        <span class="d-block text-muted font-size-sm">Project manager</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span
                                            class="badge badge-mark border-success"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                            width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Dori Laperriere</a>
                                        <span class="d-block text-muted font-size-sm">Business developer</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span
                                            class="badge badge-mark border-warning-300"></span></div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                            width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <a href="#" class="media-title font-weight-semibold">Vanessa Aurelius</a>
                                        <span class="d-block text-muted font-size-sm">UX expert</span>
                                    </div>
                                    <div class="ml-3 align-self-center"><span
                                            class="badge badge-mark border-grey-400"></span></div>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown-content-footer bg-light">
                            <a href="#" class="text-grey mr-auto">All users</a>
                            <a href="#" class="text-grey"><i class="icon-gear"></i></a>
                        </div>
                    </div>
                </li>
            </ul>

            <span class="badge bg-pink-400 badge-pill ml-md-3 mr-md-auto">16 orders</span>

            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="../../../../global_assets/images/lang/gb.png" class="img-flag mr-2" alt="">
                        English
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item english active"><img
                                src="../../../../global_assets/images/lang/gb.png" class="img-flag" alt=""> English</a>
                        <a href="#" class="dropdown-item ukrainian"><img
                                src="../../../../global_assets/images/lang/ua.png" class="img-flag" alt="">
                            Українська</a>
                        <a href="#" class="dropdown-item deutsch"><img
                                src="../../../../global_assets/images/lang/de.png" class="img-flag" alt=""> Deutsch</a>
                        <a href="#" class="dropdown-item espana"><img src="../../../../global_assets/images/lang/es.png"
                                class="img-flag" alt=""> España</a>
                        <a href="#" class="dropdown-item russian"><img
                                src="../../../../global_assets/images/lang/ru.png" class="img-flag" alt=""> Русский</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle caret-0" data-toggle="dropdown">
                        <i class="icon-bubbles4"></i>
                        <span class="d-md-none ml-2">Messages</span>
                        <span class="badge badge-mark border-pink-400 ml-auto ml-md-0"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right dropdown-content wmin-md-350">
                        <div class="dropdown-content-header">
                            <span class="font-weight-semibold">Messages</span>
                            <a href="#" class="text-default"><i class="icon-compose"></i></a>
                        </div>

                        <div class="dropdown-content-body dropdown-scrollable">
                            <ul class="media-list">
                                <li class="media">
                                    <div class="mr-3 position-relative">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                            width="36" height="36" class="rounded-circle" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">James Alexander</span>
                                                <span class="text-muted float-right font-size-sm">04:58</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">who knows, maybe that would be the best thing for
                                            me...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3 position-relative">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                            width="36" height="36" class="rounded-circle" alt="">
                                    </div>

                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Margo Baker</span>
                                                <span class="text-muted float-right font-size-sm">12:16</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">That was something he was unable to do
                                            because...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                            width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Jeremy Victorino</span>
                                                <span class="text-muted float-right font-size-sm">22:48</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">But that would be extremely strained and
                                            suspicious...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                            width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Beatrix Diaz</span>
                                                <span class="text-muted float-right font-size-sm">Tue</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">What a strenuous career it is that I've
                                            chosen...</span>
                                    </div>
                                </li>

                                <li class="media">
                                    <div class="mr-3">
                                        <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                            width="36" height="36" class="rounded-circle" alt="">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-title">
                                            <a href="#">
                                                <span class="font-weight-semibold">Richard Vango</span>
                                                <span class="text-muted float-right font-size-sm">Mon</span>
                                            </a>
                                        </div>

                                        <span class="text-muted">Other travelling salesmen live a life of
                                            luxury...</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown-content-footer bg-light">
                            <a href="#" class="text-grey mr-auto">All messages</a>
                            <div>
                                <a href="#" class="text-grey" data-popup="tooltip" title="Mark all as read"><i
                                        class="icon-radio-unchecked"></i></a>
                                <a href="#" class="text-grey ml-2" data-popup="tooltip" title="Settings"><i
                                        class="icon-cog3"></i></a>
                            </div>
                        </div>
                    </div>
                </li>
                <?php if (isset(Yii::$app->user->identity->username)) {?>
                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link d-flex align-items-center dropdown-toggle"
                        data-toggle="dropdown">

                        <?php if (isset(Yii::$app->user->identity->profile_pic)) {
                            $logo = Yii::$app->request->baseUrl . '/frontend/web/uploads/user/' . Yii::$app->user->identity->profile_pic;

                        } else {
                            $logo = Yii::$app->request->baseUrl . '/frontend/web/images/default_user.jpg';
                        }?>
                        <img class="rounded-circle mr-2" height="34" alt="" src="<?=$logo?>">


                        <span><?php echo isset(Yii::$app->user->identity->username) ? ucfirst(Yii::$app->user->identity->username) : 'User' ?></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                        <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                        <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span
                                class="badge badge-pill bg-indigo-400 ml-auto">58</span></a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                        <a href="<?php echo Url::to(['/site/logout']); ?>" data-method="post" class="dropdown-item"><i
                                class="icon-switch2"></i> Logout</a>


                    </div>
                </li>
                <?php }?>
            </ul>
        </div>
        <!-- /navbar content -->

    </div>
    <!-- /main navbar -->

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
        <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="icon-arrow-left8"></i>
                </a>
                Navigation
                <a href="#" class="sidebar-mobile-expand">
                    <i class="icon-screen-full"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler -->


            <!-- Sidebar content -->
            <div class="sidebar-content">

                <!-- User menu -->
                <div class="sidebar-user">
                    <div class="card-body">
                        <div class="media">

                            <?php 
                            
                            if (isset(Yii::$app->user->identity->institutionid)) {

                                $institution = Institution::find()->where(['institution_id' => Yii::$app->user->identity->institutionid])->andWhere(['status' => 1])->one();

                                $logo = Yii::$app->request->baseUrl . '/frontend/web/uploads/institution/' . $institution->institution_logo;
                                $institution_name  = $institution->institution_name; ?>

                            <div class="mr-3">
                                <a href="<?php echo Url::to(['/core/institution/create']); ?>"><img src="<?= $logo?>"
                                        width="38" height="38" class="rounded-circle" alt=""></a>
                            </div>

                            <div class="media-body">
                                <div class="media-title font-weight-semibold"><?= $institution_name?></div>
                                <div class="font-size-xs opacity-50">
                                    <i class="icon-office font-size-sm"></i>
                                    &nbsp;<?= $institution->institution_contactemail?>
                                </div>
                            </div>
                            <!-- <div class="ml-3 align-self-center">
                                <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                            </div> -->
                            <?php
                            }?>


                            


                        </div>
                    </div>
                </div>
                <!-- /user menu -->


                <!-- Main navigation -->
                <div class="card card-sidebar-mobile">
                    <ul class="nav nav-sidebar navigation-accordion" data-nav-type="accordion">

                        <?php
if (isset(Yii::$app->user->identity->usertypeid)) {
    $usertypeid = Yii::$app->user->identity->usertypeid;
    echo MenuController::getMenu($usertypeid);
}

?>


                    </ul>
                </div>
                <!-- /main navigation -->

            </div>
            <!-- /sidebar content -->

        </div>
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <?=$content?>


            <!-- Footer -->
            <div class="navbar navbar-expand-lg navbar-light">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                        data-target="#navbar-footer">
                        <i class="icon-unfold mr-2"></i>
                        Footer
                    </button>
                </div>

                <div class="navbar-collapse collapse" id="navbar-footer">
                    <span class="navbar-text">
                        &copy; 2015 - 2018. <a href="#">Limitless Web App Kit</a> by <a
                            href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                    </span>

                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link"
                                target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
                        <li class="nav-item"><a href="http://demo.interface.club/limitless/docs/"
                                class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a>
                        </li>
                        <li class="nav-item"><a
                                href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov"
                                class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i
                                        class="icon-cart2 mr-2"></i> Purchase</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->


    <?php $this->endBody()?>
</body>

</html>
<?php $this->endPage()?>