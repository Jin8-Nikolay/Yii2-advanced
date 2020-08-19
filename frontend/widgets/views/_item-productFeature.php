<?php

use yii\helpers\Url;
$images = $model->getImages($model->image);
?>
<?php if ($model->out_of_stock == null): ?>
    <li class="sidebar-product-list-item">
        <div class="row">
            <div class="col-xs-4 col-sm-4 no-margin">
                <a href="<?php echo Url::toRoute(['/product/'.$model->id]) ?>" class="thumb-holder">
                    <img alt="" src="<?php echo $model->getImage($images[0]) ?>" data-echo="<?php echo $model->getImage($images[0]) ?>"/>
                </a>
            </div>
            <div class="col-xs-8 col-sm-8 no-margin">
                <a href="<?php echo Url::toRoute(['/product/'.$model->id]) ?>"><?php echo $model->header ?> </a>
                <div class="price">
                    <?php if ($model->discount_id !== 0): ?>
                        <div class="price-prev">$<?php echo $model->price ?></div>
                        <div class="price-current">
                            $<?php echo $model->price - $model->price * $model->discount->value ?>
                        </div>
                    <?php else: ?>
                        <div class="price-current">$<?php echo $model->price ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </li><!-- /.sidebar-product-list-item -->
<?php endif; ?>