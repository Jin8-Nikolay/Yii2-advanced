<?php

use frontend\widgets\ProductGridWidget;
use frontend\widgets\ProductListWidget;
$this->title = 'Результат поиска';
$this->params['breadcrumbs'][] = $this->title;
$this->params['flag'] = true;
$this->params['main_category'] = true;
?>

<section id="category-grid">
    <div class="container">
        <div class="col-xs-12 col-sm-9 no-margin wide sidebar">
            <section id="gaming">
                <div class="grid-list-products">

                    <h2 class="section-title"><?php echo Yii::t('frontend', 'Товары') ?></h2>

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
                                    <?php echo ProductGridWidget::widget(['dataProvider' => $dataProvider]) ?>
                                </div><!-- /.row -->
                            </div><!-- /.product-grid-holder -->
                        </div><!-- /.products-grid #grid-view -->

                        <div id="list-view" class="products-grid fade tab-pane ">
                            <div class="products-list">
                                <?php echo ProductListWidget::widget(['dataProvider' => $dataProvider]) ?>
                            </div><!-- /.products-list -->
                        </div><!-- /.products-grid #list-view -->
                    </div><!-- /.tab-content -->

                </div><!-- /.grid-list-products -->
            </section><!-- /#gaming -->
        </div><!-- /.col -->
        <!-- ========================================= CONTENT : END ========================================= -->
    </div><!-- /.container -->
</section><!-- /#category-grid -->
