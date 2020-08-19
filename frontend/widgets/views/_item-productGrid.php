<?php

use yii\helpers\Html;
use yii\helpers\Url;
$images = $model->getImages($model->image);
?>
<div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
    <div class="product-item">
        <?php if ($model->discount_id !== 0): ?>
            <div class="ribbon red"><span><?php echo Yii::t('frontend', 'Распродажа') ?></span></div>
        <?php endif; ?>
        <?php if ($model->is_new == true): ?>
            <div class="ribbon blue"><span><?php echo Yii::t('frontend', 'Новый!')?></span></div>
        <?php endif; ?>
        <?php if ($model->bestseller == true): ?>
            <div class="ribbon green"><span><?php echo Yii::t('frontend', 'Бестселлер')?></span></div>
        <?php endif; ?>
        <div class="image">
            <img style="max-height: 216px" alt="" src="<?php echo $model->getImage($images[0])?>" data-echo="<?php echo $model->getImage($images[0])?>"/>
        </div>

        <div class="body">
            <?php if ($model->discount_id !== 0):  ?>
                <div class="label-discount green"><?php echo $model->discount->title?> <?php echo Yii::t('frontend', 'Распродажа') ?></div>
            <?php endif; ?>
            <div class="title">
                <a href="<?php echo Url::toRoute(['/product/'.$model->id]) ?>"><?php echo $model->short_content?></a>
            </div>
            <div class="brand"><?php echo $model->meta_description?></div>
        </div>
        <div class="prices">
            <?php if ($model->discount_id !== 0): ?>
                <div class="price-prev">$<?php echo $model->price ?></div>
                <div class="price-current pull-right">$<?php echo $model->price - $model->price * $model->discount->value ?></div>
            <?php else: ?>
                <div class="price-current pull-right">$<?php echo $model->price ?></div>
            <?php endif; ?>
        </div>
        <div class="hover-area">
            <div class="add-cart-button">
                <?php if($model->out_of_stock == true): ?>
                    <a class="le-button disabled" href="#"><?php echo Yii::t('frontend', 'Купить')?></a>
                <?php else: ?>
                    <?php echo Html::a(' ' . Yii::t('frontend', 'Купить') . ' ', Url::to(['/cart/add', 'id' => $model->id]), [
                        'class' => 'le-button',
                        'data' => [
                            'method' => 'post',
                        ]])?>
                <?php endif; ?>
            </div>
            <div class="wish-compare">
                <?php echo Html::a(' ' . Yii::t('frontend', 'В желаемое') . ' ', Url::to(['/wishlist/add', 'id' => $model->id]), [
                    'class' => 'btn-add-to-wishlist',
                    'data' => [
                        'method' => 'post',
                    ]])?>
                <?php echo Html::a(' ' . Yii::t('frontend', 'В сравнение') . ' ', Url::to(['/compare/add', 'id' => $model->id]), [
                    'class' => 'btn-add-to-compare',
                    'data' => [
                        'method' => 'post',
                    ]])?>
            </div>
        </div>
    </div><!-- /.product-item -->
</div><!-- /.product-item-holder -->