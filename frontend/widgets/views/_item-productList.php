<?php

use yii\helpers\Html;
use yii\helpers\Url;
$images = $model->getImages($model->image);
?>
<div class="product-item product-item-holder">
    <?php if ($model->discount_id !== 0): ?>
        <div class="ribbon red"><span><?php echo Yii::t('frontend', 'Распродажа') ?></span></div>
    <?php endif; ?>
    <?php if ($model->is_new == true): ?>
        <div class="ribbon blue"><span><?php echo Yii::t('frontend', 'Новый!')?></span></div>
    <?php endif; ?>
    <?php if ($model->bestseller == true): ?>
        <div class="ribbon green"><span><?php echo Yii::t('frontend', 'Бестселлер')?></span></div>
    <?php endif; ?>
    <div class="row">
        <div class="no-margin col-xs-12 col-sm-4 image-holder">
            <div class="image">
                <img alt="" src="<?php echo $model->getImage($images[0])?>" data-echo="<?php echo $model->getImage($images[0])?>" />
            </div>
        </div><!-- /.image-holder -->
        <div class="no-margin col-xs-12 col-sm-5 body-holder">
            <div class="body">
                <?php if ($model->discount_id !== 0):  ?>
                    <div class="label-discount green"><?php echo $model->discount->title?> <?php echo Yii::t('frontend', 'Распродажа') ?></div>
                <?php endif; ?>
                <div class="title">
                    <a href="<?php echo Url::toRoute(['/product/'.$model->id]) ?>"><?php echo $model->short_content?></a>
                </div>
                <div class="brand"><?php echo $model->meta_title ?></div>
                <div class="excerpt">
                    <p><?php echo $model->content ?></p>
                </div>
                <div class="addto-compare">
                    <?php echo Html::a(' ' . Yii::t('frontend', 'В сравнение') . ' ', Url::to(['/compare/add', 'id' => $model->id]), [
                        'class' => 'btn-add-to-compare',
                        'data' => [
                            'method' => 'post',
                        ]])?>
                </div>
            </div>
        </div><!-- /.body-holder -->
        <div class="no-margin col-xs-12 col-sm-3 price-area">
            <div class="right-clmn">
                <?php if ($model->discount_id !== 0): ?>
                <div class="price-current">$<?php echo $model->price - $model->price * $model->discount->value ?></div>
                <div class="price-prev">$<?php echo $model->price ?></div>
                <?php else: ?>
                    <div class="price-current">$<?php echo $model->price ?></div>
                <?php endif; ?>
                <div class="availability">
                    <label><?php echo Yii::t('frontend', 'Доступность')?>:</label>
                    <?php if($model->out_of_stock == true): ?>
                        <span class="not-available">
                            <?php echo Yii::t('frontend', 'Нет в наличии')?>
                        </span>
                    <?php else: ?>
                        <span class="available">
                            <?php echo Yii::t('frontend', 'Есть в наличии')?>
                        </span>
                    <?php endif; ?>
                </div>
                <?php if($model->out_of_stock == true): ?>
                    <a class="le-button disabled" href="#"><?php echo Yii::t('frontend', 'Купить')?></a>
                <?php else: ?>
                    <?php echo Html::a(' ' . Yii::t('frontend', 'Купить') . ' ', Url::to(['/cart/add', 'id' => $model->id]), [
                        'class' => 'le-button',
                        'data' => [
                            'method' => 'post',
                        ]])?>
                <?php endif; ?>
                <?php echo Html::a(' ' . Yii::t('frontend', 'В желаемое') . ' ', Url::to(['/wishlist/add', 'id' => $model->id]), [
                    'class' => 'btn-add-to-wishlist',
                    'data' => [
                        'method' => 'post',
                    ]])?>
            </div>
        </div><!-- /.price-area -->
    </div><!-- /.row -->
</div><!-- /.product-item -->
