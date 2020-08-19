<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('frontend', 'Запросить сброс пароля');
$this->params['breadcrumbs'][] = $this->title;
?>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered"><?php echo Yii::t('frontend', 'Запросить сброс пароля')?></h2>
                    <p><?php echo Yii::t('frontend', 'Пожалуйста, заполните вашу электронную почту. Ссылка для сброса пароля будет отправлена туда.')?></p>

                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                    <form role="form" class="login-form cf-style-1">
                        <div class="field-row">
                            <label><?php echo Yii::t('frontend', 'Email') ?></label>
                            <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => 'le-input'])->label(false) ?>
                        </div>

                        <div class="buttons-holder">
                            <?= Html::submitButton(''.Yii::t('frontend', 'Отправить').'', ['class' => 'le-button huge']) ?>
                        </div><!-- /.buttons-holder -->
                    </form><!-- /.cf-style-1 -->
                    <?php ActiveForm::end(); ?>
                </section><!-- /.sign-in -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</main>