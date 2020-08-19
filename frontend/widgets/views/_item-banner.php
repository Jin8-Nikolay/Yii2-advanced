<?php

use yii\helpers\Html;
use yii\helpers\Url; ?>

<div class="item" style="background-image: url(<?php echo $model->getImage($model->image)?>)">
    <div class="container-fluid">
        <div class="caption vertical-center text-left">
            <div class="big-text fadeInDown-1">
                <?= $model->big_text ?><span class="big"><span class="sign">$</span><?= $model->product->discount->value * $model->product->price ?></span>
            </div>

            <div class="excerpt fadeInDown-2">
                <?= $model->excerpt ?>
            </div>
            <div class="small fadeInDown-2">
                <?= $model->small_text ?>
            </div>
            <div class="button-holder fadeInDown-3">
                <?= Html::a(''. Yii::t('frontend', 'К товару') .'', Url::to(['/product/'.$model->product_id]), ['class' => 'big le-button ']) ?>
            </div>
        </div><!-- /.caption -->
    </div><!-- /.container-fluid -->
</div><!-- /.item -->
