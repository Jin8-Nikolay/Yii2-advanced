<?php

use common\components\MenuCategoryBuilder;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '' . Yii::t('frontend', 'Корзина') . '';
$this->params['flag'] = true;
$this->params['breadcrumbs'][] = $this->title;
$this->params['main_category'] = true;
?>

<section id="cart-page">
    <div class="container">
        <?php if (count($products) > 0): ?>
            <div class="col-xs-12 col-md-9 items-holder no-margin">
                <?php foreach ($products as $product): ?>
                    <div class="row no-margin cart-item">
                        <div class="col-xs-12 col-sm-2 no-margin">
                            <a href="#" class="thumb-holder">
                                <?php $image = $product->getImages($product->image); ?>
                                <img class="lazy" alt="" src="<?php echo $product->getImage($image[0]) ?>"/>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-5 ">
                            <div class="title">
                                <a href="#"><?php echo $product->short_content ?></a>
                            </div>
                            <div class="brand"><?php echo $product->meta_title ?></div>
                        </div>
                        <div class="col-xs-12 col-sm-3 no-margin">
                            <div class="quantity">
                                <?php echo Html::a('<i class="fa fa-minus" aria-hidden="true"></i>', Url::to(['/cart/remove', 'id' => $product->id]), ['class' => 'qty-minus']) ?>
                                <input type="number" class="qty-text" id="qty" step="1" min="1" max="300"
                                       name="quantity" value="<?php echo $productInCart[$product->id] ?>">
                                <?php echo Html::a('<i class="fa fa-plus" aria-hidden="true"></i>', Url::to(['/cart/add', 'id' => $product->id]), ['class' => 'qty-plus']) ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-2 no-margin">
                            <div class="price">
                                $<?php if ($product->discount !== 0) {
                                    echo $product->price - $product->price * $product->discount->value;
                                } else {
                                    echo $product->price;
                                }
                                ?>
                            </div>
                            <a class="close-btn"
                               href="<?php echo Url::toRoute(['/cart/delete', 'id' => $product->id]) ?>"></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="col-xs-12 col-md-3 no-margin sidebar ">
                <div class="widget cart-summary">
                    <h1 class="border"><?php echo Yii::t('frontend', 'Корзина') ?></h1>
                    <div class="body">
                        <ul id="total-price" class="tabled-data inverse-bold no-border">
                            <li>
                                <label><?php echo Yii::t('frontend', 'Весь заказ') ?></label>
                                <div class="value pull-right">$<?php echo $total ?></div>
                            </li>
                        </ul>
                        <div class="buttons-holder">
                            <a class="le-button big"
                               href="<?php echo Url::toRoute(['/cart/checkout']) ?>"><?php echo Yii::t('frontend', 'Оформить заказ') ?></a>
                            <a class="simple-link block"
                               href="<?php echo Url::toRoute(['/']) ?>"><?php echo Yii::t('frontend', 'Продолжить покупки') ?></a>
                        </div>
                    </div>
                </div>
                <div id="cupon-widget" class="widget">
                    <h1 class="border"><?php echo Yii::t('frontend', 'Купон') ?></h1>
                    <div class="body">
                        <form>
                            <div class="inline-input">
                                <input data-placeholder="<?php echo Yii::t('frontend', 'Введите код купона') ?>"
                                       type="text"/>
                                <button class="le-button"
                                        type="submit"><?php echo Yii::t('frontend', 'Вести') ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <main id="about-us">
                <div class="container inner-top-xs inner-bottom-sm">
                    <div class="row">
                        <div class="col-xs-12 col-md-8 col-lg-8 col-sm-6">

                            <section id="who-we-are" class="section m-t-0">
                                <h2><?php echo Yii::t('frontend', 'Корзина пустая')?></h2>
                                <p><?php echo Yii::t('frontend', 'Добавляйте товары в корзину, делитесь списками с друзьями и обсуждайте товары вместе.')?></p>
                            </section><!-- /#who-we-are -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </main>
        <?php endif; ?>
    </div>
</section>