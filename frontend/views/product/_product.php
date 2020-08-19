<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="star-holder inline">
    <div class="star" data-score="4"></div>
</div>
<div class="availability"><label><?php echo Yii::t('frontend', 'Доступность') ?>:</label>
    <?php if ($model->out_of_stock == true): ?>
        <span class="not-available">
                            <?php echo Yii::t('frontend', 'Распродано') ?>
                        </span>
    <?php else: ?>
        <span class="available">
                            <?php echo Yii::t('frontend', 'В наличии') ?>
                        </span>
    <?php endif; ?>
</div>

<div class="title"><a href="#"><?php echo $model->header ?></a></div>
<div class="brand"><?php echo $model->meta_description ?></div>

<div class="social-row">
    <span class="st_facebook_hcount"></span>
    <span class="st_twitter_hcount"></span>
    <span class="st_pinterest_hcount"></span>
</div>

<div class="buttons-holder">
    <?php echo Html::a(' ' . Yii::t('frontend', 'В желаемое') . ' ', Url::to(['/wishlist/add', 'id' => $model->id]), [
        'class' => 'btn-add-to-wishlist',
        'data' => [
            'method' => 'post',
        ]]) ?>
    <?php echo Html::a(' ' . Yii::t('frontend', 'В сравнение') . ' ', Url::to(['/compare/add', 'id' => $model->id]), [
        'class' => 'btn-add-to-compare',
        'data' => [
            'method' => 'post',
        ]]) ?>
</div>

<div class="excerpt">
    <p><?php echo $model->short_content ?></p>
</div>

<div class="prices">
    <?php if ($model->discount_id !== 0): ?>
        <div class="price-current">
            $<?php echo $model->price - $model->price * $model->discount->value ?>
        </div>
        <div class="price-prev">
            $<?php echo $model->price ?>
        </div>
    <?php else: ?>
        <div class="price-current">$<?php echo $model->price ?></div>
    <?php endif; ?>
</div>
<div class="qnt-holder">
    <?php echo Html::a(' ' . Yii::t('frontend', 'Купить') . ' ', Url::to(['/cart/add', 'id' => $model->id]), [
        'class' => 'le-button huge',
        'data' => [
            'method' => 'post',
        ]]) ?>
</div>