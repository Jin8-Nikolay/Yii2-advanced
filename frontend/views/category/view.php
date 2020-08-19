<?php

use common\models\ProductParamsValue;
use common\models\ProductToParams;
use frontend\widgets\FeatureProductWidget;
use frontend\widgets\MenuWidget;
use frontend\widgets\ProductGridWidget;
use frontend\widgets\ProductListWidget;
use frontend\widgets\RecommendedProductWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->title = '' . $model->title . '';
$this->params['breadcrumbs'][] = ['label' => $model->main->title, 'url' => ['/main-category/'.$model->main->alias]];
//$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['/category/'.$model->alias]];
$this->params['breadcrumbs'][] = $this->title;
$this->params['flag'] = true;
$this->params['category'] = true;
$this->params['menu'] = $model->main->id;
$this->params['menu_title'] = $model->main->title;
?>

<section id="category-grid">
    <div class="container">
        <!-- ========================================= SIDEBAR ========================================= -->
        <div class="col-xs-12 col-sm-3 no-margin sidebar narrow">
            <!-- ========================================= PRODUCT FILTER ========================================= -->
            <div class="widget">
                <h1><?php echo Yii::t('frontend', 'Фильтр товаров')?></h1>
                <div class="body bordered">
                    <?php Pjax::begin(); ?>
                    <?php $form = ActiveForm::begin([
                        'action' => ['/category/'.$model->alias],
                        'method' => 'get',
                    ]) ?>
                    <div class="category-filter">
                        <?php if (is_array($params)): ?>
                            <?php foreach ($params as $param): ?>
                                <h2><?php echo $param->name ?></h2>
                                <hr>
                                <ul>
                                    <?php
                                    $paramsValue = ProductParamsValue::findByParams($param->id);
                                    if (is_array($paramsValue)):
                                        foreach ($paramsValue as $value):?>
                                            <li>
                                                <input type="checkbox" class="le-checkbox"
                                                       name=ProductFilter[params_value][<?php echo $value->id ?>][]"
                                                       value="<?php echo $value->id ?>"/>
                                                <label><?php echo $value->translate(Yii::$app->language)->value; ?></label>
<!--                                                <label>--><?php //echo $value->value; ?><!--</label>-->
                                                <span class="pull-right">(<?php echo ProductToParams::countProduct($value->id) ?>)</span>
                                            </li>
                                        <? endforeach;
                                    endif;
                                    ?>
                                </ul>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="price-filter">

                    </div>
                    <span class="filter-button">
                            <?php echo Html::submitButton(''.Yii::t('frontend', 'Поиск').'', ['class' => 'le-button']) ?>
                    </span>
                    <?php ActiveForm::end(); ?>
                    <?php Pjax::end(); ?>
                </div><!-- /.body -->
            </div><!-- /.widget -->
            <!-- ========================================= PRODUCT FILTER : END ========================================= -->

            <!-- ========================================= FEATURED PRODUCTS ========================================= -->
            <div class="widget">
                <h1 class="border"><?php echo Yii::t('frontend', 'Рекомендуемые товары') ?></h1>
                <ul class="product-list">
                    <?php echo FeatureProductWidget::widget(['id' => $model->id]) ?>
                </ul><!-- /.product-list -->
            </div><!-- /.widget -->
            <!-- ========================================= FEATURED PRODUCTS : END ========================================= -->
        </div>
        <!-- ========================================= SIDEBAR : END ========================================= -->

        <!-- ========================================= CONTENT ========================================= -->
        <div class="col-xs-12 col-sm-9 no-margin wide sidebar">
            <section id="recommended-products" class="carousel-holder hover small">
                <div class="title-nav">
                    <h2 class="inverse"><?php echo Yii::t('frontend', 'Рекомендуемые товары') ?></h2>
                    <div class="nav-holder">
                        <a href="#prev" data-target="#owl-recommended-products"
                           class="slider-prev btn-prev fa fa-angle-left"></a>
                        <a href="#next" data-target="#owl-recommended-products"
                           class="slider-next btn-next fa fa-angle-right"></a>
                    </div>
                </div><!-- /.title-nav -->
                <div id="owl-recommended-products" class="owl-carousel product-grid-holder">
                    <?php echo RecommendedProductWidget::widget(['id' => $model->id]) ?>
                </div><!-- /#recommended-products-carousel .owl-carousel -->
            </section><!-- /.carousel-holder -->

            <section id="gaming">
                <div class="grid-list-products">
                    <h2 class="section-title"><?php echo Yii::t('frontend', 'Товары')?></h2>

                    <div class="control-bar">

                        <div class="grid-list-buttons">
                            <ul>
                                <li class="grid-list-button-item active"><a data-toggle="tab" href="#grid-view"><i
                                                class="fa fa-th-large"></i> <?php echo Yii::t('frontend', 'Сетка') ?>
                                    </a></li>
                                <li class="grid-list-button-item "><a data-toggle="tab" href="#list-view"><i
                                                class="fa fa-th-list"></i> <?php echo Yii::t('frontend', 'Список') ?>
                                    </a></li>
                            </ul>
                        </div>
                    </div><!-- /.control-bar -->
                    <div class="tab-content">
                        <div id="grid-view" class="products-grid fade tab-pane in active">

                            <div class="product-grid-holder">
                                <div class="row no-margin">
                                    <?php echo ProductGridWidget::widget(['id' => $model->id, 'dataProvider' => $dataProvider]) ?>
                                </div><!-- /.row -->
                            </div><!-- /.product-grid-holder -->
                        </div><!-- /.products-grid #grid-view -->

                        <div id="list-view" class="products-grid fade tab-pane ">
                            <div class="products-list">
                                <?php echo ProductListWidget::widget(['id' => $model->id, 'dataProvider' => $dataProvider]) ?>
                            </div><!-- /.products-list -->
                        </div><!-- /.products-grid #list-view -->
                    </div><!-- /.tab-content -->
                </div><!-- /.grid-list-products -->
            </section><!-- /#gaming -->
        </div><!-- /.col -->
        <!-- ========================================= CONTENT : END ========================================= -->
    </div><!-- /.container -->
</section><!-- /#category-grid -->
