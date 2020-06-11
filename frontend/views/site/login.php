<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
  <!-- Login form -->
                <!-- <form class="login-form" action="index.html"> -->
                    <?php $form = ActiveForm::begin(['id' => 'login-form','options' => ['class' => 'login-form']]); ?>
                    
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Login to your account</h5>
                                <span class="d-block text-muted">Enter your credentials below</span>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <!-- <input type="text" class="form-control" placeholder="Username"> -->
                              
                                <?= $form->field($model, 'username', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']
        ])->textInput()->input('username', ['placeholder' => "Username"])->label(false); ?>

                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <!-- <input type="password" class="form-control" placeholder="Password"> -->
                               
                               <?= $form->field($model, 'password', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']
        ])->passwordInput()->input('password', ['placeholder' => "Password"])->label(false);?>       
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <!-- <button type="submit" class="btn btn-primary btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button> -->
                                <?= Html::submitButton('Sign in <i class="icon-circle-right2 ml-2"></i>', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                            </div>

                            <div class="text-center">
                                <a href="login_password_recover.html">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
                <?php ActiveForm::end(); ?>
                <!-- /login form -->


