<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\SignupForm */

use common\components\MenuCategoryBuilder;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = Yii::t('frontend', 'Зарегистрироваться');
$this->params['flag'] = true;
$this->params['breadcrumbs'][] = $this->title;
$this->params['main_category'] = true;
?>

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section class="section register inner-left-xs">
                    <h2 class="bordered"><?php echo Yii::t('frontend', 'Создать новый акаунт') ?></h2>
                    <p><?php echo Yii::t('frontend', 'Создайте свой собственный аккаунт Media Center') ?></p>


                    <!--                    <form role="form" class="register-form cf-style-1">-->
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <div class="field-row">
                        <label><?php echo Yii::t('frontend', 'имя пользователя') ?></label>
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'le-input'])->label(false) ?>
                    </div>

                    <div class="field-row">
                        <label>Email</label>
                        <?= $form->field($model, 'email')->textInput(['class' => 'le-input'])->label(false) ?>
                    </div>

                    <div class="field-row">
                        <label><?php echo Yii::t('frontend', 'Пароль') ?></label>
                        <?= $form->field($model, 'password')->passwordInput(['class' => 'le-input'])->label(false) ?>
                    </div>

                    <div class="buttons-holder">
                        <?= Html::submitButton(' ' . Yii::t('frontend', 'Создать') . ' ', ['class' => 'le-button huge', 'name' => 'signup-button']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                    <!--                    </form>-->


                    <h2 class="semi-bold"><?php echo Yii::t('frontend', 'Зарегистрируйтесь сегодня, и вы сможете:') ?></h2>

                    <ul class="list-unstyled list-benefits">
                        <li>
                            <i class="fa fa-check primary-color"></i> <?php echo Yii::t('frontend', 'Ускорьте свой путь через кассу') ?>
                        </li>
                        <li>
                            <i class="fa fa-check primary-color"></i> <?php echo Yii::t('frontend', 'Отслеживайте свои заказы легко') ?>
                        </li>
                        <li>
                            <i class="fa fa-check primary-color"></i> <?php echo Yii::t('frontend', 'Ведите учет всех ваших покупок') ?>
                        </li>
                    </ul>

                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main>
