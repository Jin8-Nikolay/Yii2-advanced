<?php
use common\components\MenuCategoryBuilder;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = ''.Yii::t('frontend', 'Желаемое').'';
$this->params['flag'] = true;
$this->params['breadcrumbs'][] = $this->title;
$this->params['main_category'] = true;
?>
<?php if (isset($productList)): ?>
<div class="main-content" id="main-content">
    <div class="row">
        <div class="col-lg-10 center-block page-wishlist style-cart-page inner-bottom-xs">

            <div class="inner-xs">
                <div class="page-header">
                    <h2 class="page-title"><?php echo Yii::t('frontend', 'Моё желаемое')?></h2>
                </div>
            </div><!-- /.section-page-title -->

            <div class="items-holder">
                <div class="container-fluid wishlist_table">
                    <?php foreach ($productList as $product):?>
                    <div class="row cart-item cart_item" id="yith-wcwl-row-1">

                        <div class="col-xs-12 col-sm-1 no-margin">
                            <a title="Remove this product" class="remove_from_wishlist remove-item" href="<?php echo Url::toRoute(['/wishlist/delete', 'id' => $product->id ])?>">×</a>
                        </div>

                        <div class="col-xs-12 col-sm-1 no-margin">
                            <a href="single-product.html">
                                <?php $images = $product->getImages($product->image) ?>
                                <img width="73" height="73" alt="Canon PowerShot Elph 115 IS" class="attachment-shop_thumbnail wp-post-image" src="<?php echo $product->getImage($images[0])?>">
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-4 no-margin">
                            <div class="title">
                                <a href="single-product.html"><?php echo $product->short_content?></a>
                            </div><!-- /.title -->
                            <div>
                                <?php if ($product->out_of_stock == true): ?>
                                    <span class="label label-danger wishlist-out-of-stock"><?php echo Yii::t('frontend', 'Нет в наличии')?></span>
                                <?php else: ?>
                                    <span class="label label-success wishlist-in-stock"><?php echo Yii::t('frontend', 'Есть в наличии')?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3 no-margin">
                            <div class="price">
                                <?php if ($product->discount_id !== 0): ?>
                                    <span class="amount">$<?php echo $product->price - $product->price * $product->discount->value ?></span>
                                <?php else: ?>
                                    <span class="amount">$<?php echo $product->price ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-3 no-margin">
                            <div class="text-right">
                                <div class="add-cart-button">
<!--                                    <a class="le-button add_to_cart_button product_type_simple" href="cart.html.html">Add to cart</a>-->
                                    <?php if($product->out_of_stock == true): ?>
                                        <a class="le-button disabled" href=""><?php echo Yii::t('frontend', 'Купить')?></a>
                                    <?php else: ?>
                                        <?php echo Html::a(' ' . Yii::t('frontend', 'Купить') . ' ', Url::to(['/cart/add', 'id' => $product->id]), [
                                            'class' => 'le-button add_to_cart_button product_type_simple',
                                            'data' => [
                                                'method' => 'post',
                                            ]])?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.cart-item -->
                    <?php endforeach; ?>
                </div><!-- /.wishlist-table -->
            </div><!-- /.items-holder -->

        </div><!-- .large-->
    </div><!-- .row-->
</div>
<?php else: ?>
    <main id="about-us">
        <div class="container inner-top-xs inner-bottom-sm">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-lg-8 col-sm-6">

                    <section id="who-we-are" class="section m-t-0">
                        <h2><?php echo Yii::t('frontend', 'Список желаний пуст')?></h2>
                        <p><?php echo Yii::t('frontend', 'Добавляйте товары в список желаний, делитесь списками с друзьями и обсуждайте товары вместе.')?></p>
                    </section><!-- /#who-we-are -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </main>
<?php endif; ?>
