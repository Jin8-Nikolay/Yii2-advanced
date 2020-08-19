<?php

use common\components\MenuCategoryBuilder;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '' . Yii::t('frontend', 'Сравнение') . '';
$this->params['flag'] = true;
$this->params['breadcrumbs'][] = $this->title;
$this->params['main_category'] = true;
?>

<div class="main-content" id="main-content">
    <div class="container">
        <?php if (isset($productList)): ?>
            <div class="inner-xs">
                <div class="page-header">
                    <h2 class="page-title">
                        <?php echo Yii::t('frontend', 'Сравнение продуктов') ?>
                    </h2>
                </div>
            </div><!-- /.section-page-title -->

            <div class="table-responsive inner-bottom-xs inner-top-xs">

                <table class="table table-bordered table-striped compare-list">

                    <thead>

                    <tr>
                        <td>&nbsp;</td>
                        <?php foreach ($productList as $product): ?>

                            <td class="text-center">
                                <div class="image-wrap">

                                    <?php echo Html::a(' <i
                                                class="fa fa-times-circle"></i>', Url::to(['/compare/delete', 'id' => $product->id]), [
                                        'class' => 'remove-link',
                                        'data' => [
                                            'method' => 'post',
                                        ]]) ?>
                                    <?php $images = $product->getImages($product->image) ?>
                                    <img alt="Iconia W700"
                                         class="attachment-yith-woocompare-image"
                                         src="<?php echo $product->getImage($images[0]) ?>">
                                </div>
                                <p><strong><?php echo $product->short_content ?></strong></p>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    <tr class="tr-add-to-cart">
                        <td>&nbsp;</td>
                        <?php foreach ($productList as $product): ?>
                            <td class="text-center">
                                <div class="add-cart-button">
                                    <?php if ($product->out_of_stock == true): ?>
                                        <a class="le-button disabled"
                                           href=""><?php echo Yii::t('frontend', 'Купить') ?></a>
                                    <?php else: ?>
                                        <?php echo Html::a(' ' . Yii::t('frontend', 'Купить') . ' ', Url::to(['/cart/add', 'id' => $product->id]), [
                                            'class' => 'le-button add_to_cart_button  product_type_variable',
                                            'data' => [
                                                'method' => 'post',
                                            ]]) ?>
                                    <?php endif; ?>
                                </div>
                            </td>
                        <?php endforeach; ?>
                    </tr>

                    </thead>
                    <tbody>

                    <tr class="comparison-item price">
                        <th><?php echo Yii::t('frontend', 'Цена') ?></th>
                        <?php foreach ($productList as $product): ?>
                            <td class="comparison-item-cell even product_34">
                                <?php if ($product->discount_id == 0): ?>
                                    <ins>
                                        <span class="amount">$<?php echo $product->price ?></span>
                                    </ins>
                                <?php else: ?>
                                    <del>
                                        <span class="amount">$<?php echo $product->price ?></span>
                                    </del>
                                    <ins>
                                        <span class="amount">$<?php echo $product->price - $product->price * $product->discount->value ?></span>
                                    </ins>
                                <?php endif; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>

                    <tr class="comparison-item description">
                        <th><?php echo Yii::t('frontend', 'Описание') ?></th>
                        <?php foreach ($productList as $product): ?>
                            <td class="comparison-item-cell even product_20">
                                <p><?php echo $product->content ?></p>
                            </td>
                        <?php endforeach; ?>
                    </tr>

                    <tr class="comparison-item stock">
                        <th><?php echo Yii::t('frontend', 'Доступность') ?></th>
                        <?php foreach ($productList as $product): ?>
                            <?php if ($product->out_of_stock == true): ?>
                                <td class="comparison-item-cell odd product_39">
                                <span class="label label-danger"><span
                                            class=""><?php echo Yii::t('frontend', 'Нет в наличии') ?></span></span>
                                </td>
                            <?php else: ?>
                                <td class="comparison-item-cell odd product_39">
                                <span class="label label-success"><span
                                            class=""><?php echo Yii::t('frontend', 'Есть в наличии') ?></span></span>
                                </td>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tr>

                    <tr class="price repeated">
                        <th><?php echo Yii::t('frontend', 'Цена') ?></th>
                        <?php foreach ($productList as $product): ?>
                            <td class="even product_34">
                                <?php if ($product->discount_id == 0): ?>
                                    <ins>
                                        <span class="amount">$<?php echo $product->price ?></span>
                                    </ins>
                                <?php else: ?>
                                    <del>
                                        <span class="amount">$<?php echo $product->price ?></span>
                                    </del>
                                    <ins>
                                        <span class="amount">$<?php echo $product->price - $product->price * $product->discount->value ?></span>
                                    </ins>
                                <?php endif; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        <?php else: ?>
            <main id="about-us">
                <div class="container inner-top-xs inner-bottom-sm">
                    <div class="row">
                        <div class="col-xs-12 col-md-8 col-lg-8 col-sm-6">

                            <section id="who-we-are" class="section m-t-0">
                                <h2><?php echo Yii::t('frontend', 'Список сравнений пуст')?></h2>
                                <p><?php echo Yii::t('frontend', 'Добавляйте товары в список сравнений, делитесь списками с друзьями и обсуждайте товары вместе.')?></p>
                            </section><!-- /#who-we-are -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </main>
        <?php endif; ?>
    </div><!-- /.container -->
</div>
