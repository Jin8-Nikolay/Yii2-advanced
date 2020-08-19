<?php
use yii\helpers\Url;
?>

<div class="col-xs-12 col-sm-4 no-margin product-item-holder hover">
    <div class="product-item">
        <div class="image">
            <img alt="" src="<?php echo $model->getImage()?>" data-echo="<?php echo $model->getImage()?>" />
        </div>
        <div class="hover-area">
            <div class="add-cart-button">
                <a href="<?php echo Url::toRoute(['/category/'.$model->alias]) ?>" class="le-button"><?php echo $model->title?></a>
            </div>
        </div>
    </div><!-- /.product-item -->
</div><!-- /.product-item-holder -->