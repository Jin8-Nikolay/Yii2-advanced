<?php

use common\components\MenuBuilder;
use frontend\widgets\BannerWidget;
use yii\bootstrap\Modal;

$this->title = '' . Yii::t('frontend', 'Главная') . '';
?>
<div id="top-banner-and-menu">
    <div class="container">
        <div class="col-xs-12 col-sm-4 col-md-3 sidemenu-holder">
            <!-- ================================== TOP NAVIGATION ================================== -->
            <div class="side-menu animate-dropdown">
                <div class="head"><i class="fa fa-list"></i><?php echo Yii::t('frontend', 'Все категории') ?></div>
                <nav class="yamm megamenu-horizontal" role="navigation">
                    </a>

                    <?php

                    $dependency = [
                        'class' => 'yii\caching\DbDependency',
                        'sql' => 'SELECT `content` FROM `menu` WHERE `key` LIKE "main_menu_%"',
                    ];
                    if ($this->beginCache('MenuBuilder', ['dependency' => $dependency])) {
                        echo MenuBuilder::show('main_menu_' . Yii::$app->language, [
                            'ul' => 'nav',
                            'ul_li' => 'dropdown menu-item',
                            'ul_li_a' => 'dropdown-toggle',
                            'ul_li_a_ul' => 'dropdown-menu mega-menu',
                            'ul_li_a_ul_li' => 'yamm-content',
                            'ul_li_a_ul_li_div' => 'row',
                            'ul_li_a_ul_li_div_div' => 'col-xs-12 col-lg-4',
                        ]);
                        $this->endCache();
                    }
                    ?>
                </nav><!-- /.megamenu-horizontal -->
            </div><!-- /.side-menu -->
            <!-- ================================== TOP NAVIGATION : END ================================== -->
        </div><!-- /.sidemenu-holder -->
        <?php
        Modal::begin([
        'header' => '<h2>Hello world</h2>',
        'toggleButton' => ['label' => 'click me'],
        ]);

        echo 'Say hello...';

        Modal::end();
        ?>
        <div class="col-xs-12 col-sm-8 col-md-9 homebanner-holder">
            <!-- ========================================== SECTION – HERO ========================================= -->
            <div id="hero">

                <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                    <?= BannerWidget::widget() ?>


                </div><!-- /.owl-carousel -->
            </div>
            <!-- ========================================= SECTION – HERO : END ========================================= -->
        </div><!-- /.homebanner-holder -->
    </div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->
