<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <section class="section-account">
        <div class="img-backdrop" style="background-image: url('../../assets/img/img16.jpg')"></div>
        <div class="spacer"></div>
        <div class="card contain-sm style-transparent">
            <div class="card-body">
                <div class="row">

                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="row">
                        <div class="col-xs-6 text-left">
                            <?= $form->field($model, 'rememberMe')->checkbox() ?>
                        </div><!--end .col -->
                        <div class="col-xs-6 text-right">
                            <button class="btn btn-primary btn-raised" type="submit">Login</button>
                        </div><!--end .col -->
                    </div><!--end .row -->
                    <?php ActiveForm::end(); ?>
                </div><!--end .row -->
            </div><!--end .card-body -->
        </div>
    </section>
</div>


