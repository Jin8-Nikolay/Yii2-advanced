<?php


use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>
<main id="faq" class="inner">
    <div class="container">
        <div class="row">
            <div class="col-md-8 center-block">
                <div class="info-404 text-center">
                    <h2 class="primary-color inner-bottom-xs"><?= Html::encode($this->title) ?></h2>
                    <p class="lead"><?= nl2br(Html::encode($message)) ?></p>
                    <div class="text-center">
                        <a href="<?php echo Url::to(['/'])?>" class="btn-lg huge"><i class="fa fa-home"></i> <?php echo Yii::t('frontend', 'Вернуться на домашнюю страницу')?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>