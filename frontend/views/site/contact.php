<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
$this->title = ''.Yii::t('frontend', 'Контакты').'';
?>
<main id="contact-us" class="inner-bottom-md">

    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <section class="section leave-a-message">
                    <h2 class="bordered"><?php echo Yii::t('frontend', 'Оставить сообщение') ?></h2>
                    <p>Maecenas dolor elit, semper a sem sed, pulvinar molestie lacus. Aliquam dignissim, elit non
                        mattis ultrices, neque odio ultricies tellus, eu porttitor nisl ipsum eu massa.</p>
                    <form id="contact-form" class="contact-form cf-style-1 inner-top-xs" method="post">
                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                        <div class="row field-row">
                            <div class="col-xs-12 col-sm-6">
                                <label><?php echo Yii::t('frontend', 'Имя') ?></label>
                                <?= $form->field($model, 'name')->textInput(['autofocus' => true, 'class' => 'le-input'])->label(false) ?>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <label><?php echo Yii::t('frontend', 'Email') ?></label>
                                <?= $form->field($model, 'email')->textInput(['class' => 'le-input'])->label(false) ?>
                            </div>
                        </div><!-- /.field-row -->
                        <div class="field-row">
                            <label><?php echo Yii::t('frontend', 'Тема') ?></label>
                            <?= $form->field($model, 'subject')->textInput(['class' => 'le-input'])->label(false) ?>
                        </div>
                        <div class="field-row">
                            <label><?php echo Yii::t('frontend', 'Сообщение') ?></label>
                            <?= $form->field($model, 'body')->textarea(['rows' => 6, 'class' => 'le-input'])->label(false) ?>
                        </div>
                        <div class="field-row">
                            <label><?php echo Yii::t('frontend', 'Код проверки') ?></label>
                            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                            ])->label(false) ?>
                        </div>
                        <div class="buttons-holder">
                            <?= Html::submitButton('' . Yii::t('frontend', 'Отправить') . '', ['class' => 'le-button huge', 'name' => 'contact-button']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </form><!-- /.contact-form -->
                </section><!-- /.leave-a-message -->
            </div><!-- /.col -->

            <div class="col-md-4">
                <section class="our-store section inner-left-xs">
                    <h2 class="bordered"><?php echo Yii::t('frontend', 'Наш магазин') ?></h2>
                    <address>
                        17 Princess Road <br>
                        <?php echo Yii::t('frontend', 'London, Большой Лондон') ?> <br>
                        <?php echo Yii::t('frontend', 'NW1 8JR, Великобритания') ?>
                    </address>
                    <h3><?php echo Yii::t('frontend', 'Часы работы')?></h3>
                    <ul class="list-unstyled operation-hours">
                        <li class="clearfix">
                            <span class="day"><?php echo Yii::t('frontend', 'Понедельник')?>:</span>
                            <span class="pull-right hours">12:00 - 18:00</span>
                        </li>
                        <li class="clearfix">
                            <span class="day"><?php echo Yii::t('frontend', 'Вторник')?>:</span>
                            <span class="pull-right hours">12:00 - 18:00</span>
                        </li>
                        <li class="clearfix">
                            <span class="day"><?php echo Yii::t('frontend', 'Среда')?>:</span>
                            <span class="pull-right hours">12:00 - 18:00</span>
                        </li>
                        <li class="clearfix">
                            <span class="day"><?php echo Yii::t('frontend', 'Четверг')?>:</span>
                            <span class="pull-right hours">12:00 - 18:00</span>
                        </li>
                        <li class="clearfix">
                            <span class="day"><?php echo Yii::t('frontend', 'Пятница')?>:</span>
                            <span class="pull-right hours">12:00 - 18:00</span>
                        </li>
                        <li class="clearfix">
                            <span class="day"><?php echo Yii::t('frontend', 'Суббота')?>:</span>
                            <span class="pull-right hours">12:00 - 18:00</span>
                        </li>
                        <li class="clearfix">
                            <span class="day"><?php echo Yii::t('frontend', 'воскресенье')?></span>
                            <span class="pull-right hours"><?php echo Yii::t('frontend', 'Закрыто')?></span>
                        </li>
                    </ul>
                    <h3><?php echo Yii::t('frontend', 'Карьера')?></h3>
                    <p><?php echo Yii::t('frontend', 'Если вы заинтересованы в возможностях трудоустройства в MediaCenter, пожалуйста, напишите нам')?>: <a
                                href="mailto:contact@yourstore.com">contact@yourstore.com</a></p>
                </section><!-- /.our-store -->
            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main>