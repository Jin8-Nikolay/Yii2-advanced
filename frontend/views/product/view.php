<?php

use common\models\Comments;
use common\models\Product;
use frontend\widgets\AdditionalInformationWidget;
use frontend\widgets\CommentsWidget;
use frontend\widgets\MenuWidget;
use frontend\widgets\ProductPhotoWidget1;
use frontend\widgets\ProductPhotoWidget2;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = ''.$model->short_content.'';
$this->params['breadcrumbs'][] = ['label' => $model->category->main->title, 'url' => ['/main-category/'.$model->category->main->alias]];
$this->params['breadcrumbs'][] = ['label' => $model->category->title, 'url' => ['/category/'.$model->category->alias]];
$this->params['breadcrumbs'][] = $this->title;
$this->params['flag'] = true;
$this->params['category'] = true;
$this->params['menu'] = $model->category->main_category_id ;
$this->params['menu_title'] = $model->category->main->title;
?>

<div id="single-product">
    <div class="container">
        <div class="no-margin col-xs-12 col-sm-6 col-md-5 gallery-holder">
            <div class="product-item-holder size-big single-product-gallery small-gallery">
                <div id="owl-single-product" class="owl-carousel">
                    <?php
                    $images = $model->getImages($model->image);
                    $count = 1;
                    ?>
                    <?php foreach ($images as $image): ?>
                        <div class="single-product-gallery-item" id="slide<?php echo $count++ ?>">
                            <a data-rel="prettyphoto" href="<?php echo $model->getImage($image) ?>">
                                <img class="img-responsive" alt="" src="<?php echo $model->getImage($image) ?>"
                                     data-echo="<?php echo $model->getImage($image) ?>"/>
                            </a>
                        </div><!-- /.single-product-gallery-item -->
                    <?php endforeach; ?>
                </div>
                <div class="single-product-gallery-thumbs gallery-thumbs">
                    <div id="owl-single-product-thumbnails" class="owl-carousel">
                        <?php
                        $count1 = 1;
                        $count2 = 0;
                        foreach ($images as $image): ?>
                            <a class="horizontal-thumb active" data-target="#owl-single-product"
                               data-slide="<?php echo $count2++ ?>"
                               href="#slide<?php echo $count1++ ?>">
                                <img width="67" alt="" src="<?php echo $model->getImage($image) ?>"
                                     data-echo="<?php echo $model->getImage($image) ?>"/>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="nav-holder left hidden-xs">
                        <a class="prev-btn slider-prev" data-target="#owl-single-product-thumbnails" href="#prev"></a>
                    </div>
                    <div class="nav-holder right hidden-xs">
                        <a class="next-btn slider-next" data-target="#owl-single-product-thumbnails" href="#next"></a>
                    </div>
                </div>
            </div><!-- /.single-product-gallery -->
        </div><!-- /.gallery-holder -->
        <div class="no-margin col-xs-12 col-sm-7 body-holder">
            <div class="body">
                <?= $this->render('_product', [
                    'model' => $model,
                ]) ?>
            </div>
        </div><!-- /.body-holder -->
    </div><!-- /.container -->
</div><!-- /.single-product -->

<!-- ========================================= SINGLE PRODUCT TAB ========================================= -->
<section id="single-product-tab">
    <div class="container">
        <div class="tab-holder">

            <ul class="nav nav-tabs simple">
                <li class="active"><a href="#description"
                                      data-toggle="tab"><?php echo Yii::t('frontend', 'Описание') ?></a></li>
                <li><a href="#additional-info"
                       data-toggle="tab"><?php echo Yii::t('frontend', 'Дополнительная информация') ?></a></li>
                <li><a href="#reviews" data-toggle="tab"><?php echo Yii::t('frontend', 'Отзывы') ?>
                        (<?php echo Comments::find()->where(['product_id' => $model->id])->count() ?>)</a></li>
            </ul><!-- /.nav-tabs -->
            <?= $this->render('_tab-content', [
                    'model' => $model
            ]) ?>
        </div><!-- /.tab-holder -->
    </div><!-- /.container -->
</section><!-- /#single-product-tab -->
