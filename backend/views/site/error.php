<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div id="content">
    <section>
        <div class="section-header">
            <ol class="breadcrumb">
                <li><a href="<?php echo Url::toRoute(['/site/index'])?>"><?php echo Yii::t('backend', 'Главная')?></a></li>
                <li class="active">404</li>
            </ol>
        </div>
        <div class="section-body contain-lg">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1><span class="text-xxxl text-light">404 <i class="fa fa-search-minus text-primary"></i></span></h1>
                    <h2 class="text-light"> <?= nl2br(Html::encode($message)) ?></h2>
                </div><!--end .col -->
            </div><!--end .row -->
        </div><!--end .section-body -->
    </section>
</div>