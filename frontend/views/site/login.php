<?php

use common\components\MenuCategoryBuilder;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('frontend', 'Авторизоваться');
$this->params['flag'] = true;
$this->params['breadcrumbs'][] = $this->title;
$this->params['main_category'] = true;
?>

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered"><?php echo Yii::t('frontend', 'Авторизация')?></h2>
                    <p><?php echo Yii::t('frontend', 'Здравствуйте, Добро пожаловать в ваш аккаунт')?></p>

                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <form role="form" class="login-form cf-style-1">
                        <div class="field-row">
                            <label><?php echo Yii::t('frontend', 'имя пользователя') ?></label>
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'le-input'])->label(false) ?>
                        </div>

                        <div class="field-row">
                            <label><?php echo Yii::t('frontend', 'Пароль')?></label>
                            <?= $form->field($model, 'password')->passwordInput(['class' => 'le-input'])->label(false) ?>
                        </div>

                        <div class="field-row clearfix">
                            <span class="pull-left">
                                <label class="content-color" style="margin-left: 20px">
                                    <?= $form->field($model, 'rememberMe')->checkbox(['class' => 'le-checbox auto-width inline'])->label(false) ?>
                                    <span class="bold"><?php echo Yii::t('frontend', 'Запомнить меня')?></span>
                            </span>
                            <span class="pull-right">
                                <?= Html::a(' ' . Yii::t('frontend', 'Забыли пароль ?') . ' ', ['site/request-password-reset'], ['class' => 'content-color bold']) ?>
                            </span>
                        </div>

                        <div class="buttons-holder">
                            <?= Html::submitButton(' ' . Yii::t('frontend', 'Авторизоваться') . ' ', ['class' => 'le-button huge', 'name' => 'login-button']) ?>
                        </div><!-- /.buttons-holder -->
                    </form><!-- /.cf-style-1 -->
                    <?php ActiveForm::end(); ?>
                </section><!-- /.sign-in -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</main>
