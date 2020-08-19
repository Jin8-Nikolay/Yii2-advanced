<?php

use backend\assets\AppAsset;
use frontend\widgets\LanguageSwitch;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="menubar-hoverable header-fixed ">
<?php $this->beginBody() ?>
<?php if (Yii::$app->user->identity->username): ?>

    <header id="header">
        <div class="headerbar">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="headerbar-left">
                <ul class="header-nav header-nav-options">
                    <li class="header-nav-brand">
                        <div class="brand-holder">
                            <a href="<?php echo Url::toRoute(['/site/index']) ?>">
                                <span class="text-lg text-bold text-primary">MATERIAL ADMIN</span>
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                    <li style="padding-top: 18px;">
                        <?php echo LanguageSwitch::widget() ?>
                    </li>
                </ul>
            </div>

            <div class="headerbar-right">
                <ul class="header-nav header-nav-profile">
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                            <img src="/backend/web/img/avatar1.jpg?1403934956" alt=""/>
                            <span class="profile-info">
                                <?php echo Yii::$app->user->identity->username ?>
                                <small><?php echo Yii::t('backend', 'Администратор') ?> </small>
                        </span>
                        </a>
                        <ul class="dropdown-menu animation-dock">
                            <li><a href="/admin/site/logout"><i class="fa fa-fw fa-power-off text-danger"></i>
                                    <?php echo Yii::t('backend', 'Выйти') ?></a></li>
                        </ul><!--end .dropdown-menu -->
                    </li><!--end .dropdown -->
                </ul><!--end .header-nav-profile -->

            </div><!--end #header-navbar-collapse -->
        </div>
    </header>
    <!-- END HEADER-->

    <!-- BEGIN BASE-->
    <div id="base">
        <!-- BEGIN OFFCANVAS LEFT -->
        <div class="offcanvas">
        </div><!--end .offcanvas-->
        <!-- END OFFCANVAS LEFT -->

        <!-- BEGIN CONTENT-->
        <div id="content">
            <section>
                <div class="section-body">
                    <?php if (isset($this->params['breadcrumbs'])): ?>
                        <div class="row">
                            <ol class="breadcrumb">
                                <?= Breadcrumbs::widget([
                                    'links' => $this->params['breadcrumbs'],
                                    'homeLink' => [
                                        'label' => Yii::t('frontend', 'Главная'),
                                        'url' => Yii::$app->homeUrl,
                                    ],
                                ]) ?>
                                <?= Alert::widget() ?>
                            </ol>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="page-header"><?php echo $this->title ?></h1>
                                </div>
                            </div>
                        </div><!--end .row -->
                    <?php endif; ?>
                    <?php echo $content; ?>
                </div><!--end .section-body -->
            </section>
        </div><!--end #content-->
        <!-- END CONTENT -->

        <!-- BEGIN MENUBAR-->
        <div id="menubar" class="menubar-inverse ">
            <div class="menubar-fixed-panel">
                <div>
                    <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar"
                       href="javascript:void(0);">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="expanded">
                    <a href="../../html/dashboards/dashboard.html">
                        <span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
                    </a>
                </div>
            </div>
            <div class="menubar-scroll-panel">
                <!-- BEGIN MAIN MENU -->
                <ul id="main-menu" class="gui-controls">

                    <!-- BEGIN DASHBOARD -->
                    <li>
                        <a href="<?php echo Url::to(['/site/index']) ?>" class="active">
                            <div class="gui-icon"><i class="md md-home"></i></div>
                            <span class="title"><?php echo Yii::t('backend', 'Главная') ?></span>
                        </a>
                    </li><!--end /menu-li -->
                    <!-- END DASHBOARD -->

                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><i class="md md-layers"></i></div>
                            <span class="title"><?php echo Yii::t('backend', 'Главное') ?></span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="<?php echo Url::to(['/language/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Языки') ?></span></a>
                            </li>
                            <li><a href="<?php echo Url::to(['/redirect/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Редирект') ?></span></a>
                            <li><a href="<?php echo Url::to(['/menu/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Меню') ?></span></a>
                            </li>
                            <li><a href="<?php echo Url::to(['/users/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Пользователи') ?></span></a>
                            </li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->

                    <!-- BEGIN EMAIL -->
                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><i class="md md-account-balance"></i></div>
                            <span class="title"><?php echo Yii::t('backend', 'Категории') ?></span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="<?php echo Url::to(['/main-category/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Главные категории') ?></span></a>
                            </li>
                            <li><a href="<?php echo Url::to(['/category/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Категории') ?></span></a>
                            </li>
                            <li><a href="<?php echo Url::to(['/home-banner/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Баннер') ?></span></a>
                            </li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->
                    <!-- END EMAIL -->

                    <!-- BEGIN DASHBOARD -->
                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><i class="md md-web"></i></div>
                            <span class="title"><?php echo Yii::t('backend', 'Товары') ?></span>
                        </a>

                        <ul>
                            <li><a href="<?php echo Url::to(['/product/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Товары') ?></span></a>
                            </li>
                            <li><a href="<?php echo Url::to(['/discount/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Скидки') ?></span></a>
                            </li>
                            <li><a href="<?php echo Url::to(['/additional-information/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Дополнительная информация') ?></span></a>
                            </li>
                            <li><a href="<?php echo Url::to(['/delivery/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Доставки') ?></span></a>
                            </li>
                            <li><a href="<?php echo Url::to(['/payment/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Платёжные системы') ?></span></a>
                            </li>
                            <li><a href="<?php echo Url::to(['/product-params/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Параметры товаров') ?></span></a>
                            </li>
                            <li><a href="<?php echo Url::to(['/product-params-value/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Значение параметров') ?></span></a>
                            </li>
                            <li><a href="<?php echo Url::to(['/product-to-params/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Связь товара с параметрами') ?></span></a>
                            </li>
                        </ul>
                    </li><!--end /menu-li -->

                    <li class="gui-folder">
                        <a>
                            <div class="gui-icon"><i class="md md-account-circle"></i></div>
                            <span class="title"><?php echo Yii::t('backend', 'Заказы') ?></span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="<?php echo Url::to(['/order/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Заказы') ?></span></a>
                            </li>
                            <li><a href="<?php echo Url::to(['/order-item/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Заказы с товарами') ?></span></a>
                            </li>
                            <li><a href="<?php echo Url::to(['/user-to-order/index']) ?>"><span
                                            class="title"><?php echo Yii::t('backend', 'Заказы с пользователями') ?></span></a>
                            </li>
                        </ul><!--end /submenu -->
                    </li><!--end /menu-li -->
                    <!-- END DASHBOARD -->
                </ul><!--end .main-menu -->
                <!-- END MAIN MENU -->

                <div class="menubar-foot-panel">
                    <small class="no-linebreak hidden-folded">
                        <span class="opacity-75">Copyright &copy; 2014</span> <strong>CodeCovers</strong>
                    </small>
                </div>
            </div><!--end .menubar-scroll-panel-->
        </div><!--end #menubar-->
        <!-- END MENUBAR -->

        <!-- BEGIN OFFCANVAS RIGHT -->
        <div class="offcanvas">

            <!-- BEGIN OFFCANVAS SEARCH -->
            <div id="offcanvas-search" class="offcanvas-pane width-8">
                <div class="offcanvas-head">
                    <header class="text-primary">Search</header>
                    <div class="offcanvas-tools">
                        <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                            <i class="md md-close"></i>
                        </a>
                    </div>
                </div>
                <div class="offcanvas-body no-padding">
                    <ul class="list ">
                        <li class="tile divider-full-bleed">
                            <div class="tile-content">
                                <div class="tile-text"><strong>A</strong></div>
                            </div>
                        </li>
                        <li class="tile">
                            <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas"
                               data-backdrop="false">
                                <div class="tile-icon">
                                    <img src="/backend/web/img/avatar4.jpg?1404026791" alt=""/>
                                </div>
                                <div class="tile-text">
                                    Alex Nelson
                                    <small>123-123-3210</small>
                                </div>
                            </a>
                        </li>
                        <li class="tile">
                            <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas"
                               data-backdrop="false">
                                <div class="tile-icon">
                                    <img src="/backend/web/img/avatar9.jpg?1404026744" alt=""/>
                                </div>
                                <div class="tile-text">
                                    Ann Laurens
                                    <small>123-123-3210</small>
                                </div>
                            </a>
                        </li>
                        <li class="tile divider-full-bleed">
                            <div class="tile-content">
                                <div class="tile-text"><strong>J</strong></div>
                            </div>
                        </li>
                        <li class="tile">
                            <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas"
                               data-backdrop="false">
                                <div class="tile-icon">
                                    <img src="/backend/web/img/avatar2.jpg?1404026449" alt=""/>
                                </div>
                                <div class="tile-text">
                                    Jessica Cruise
                                    <small>123-123-3210</small>
                                </div>
                            </a>
                        </li>
                        <li class="tile">
                            <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas"
                               data-backdrop="false">
                                <div class="tile-icon">
                                    <img src="/backend/web/img/avatar8.jpg?1404026729" alt=""/>
                                </div>
                                <div class="tile-text">
                                    Jim Peters
                                    <small>123-123-3210</small>
                                </div>
                            </a>
                        </li>
                        <li class="tile divider-full-bleed">
                            <div class="tile-content">
                                <div class="tile-text"><strong>M</strong></div>
                            </div>
                        </li>
                        <li class="tile">
                            <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas"
                               data-backdrop="false">
                                <div class="tile-icon">
                                    <img src="/backend/web/img/avatar5.jpg?1404026513" alt=""/>
                                </div>
                                <div class="tile-text">
                                    Mabel Logan
                                    <small>123-123-3210</small>
                                </div>
                            </a>
                        </li>
                        <li class="tile">
                            <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas"
                               data-backdrop="false">
                                <div class="tile-icon">
                                    <img src="/backend/web/img/avatar11.jpg?1404026774" alt=""/>
                                </div>
                                <div class="tile-text">
                                    Mary Peterson
                                    <small>123-123-3210</small>
                                </div>
                            </a>
                        </li>
                        <li class="tile">
                            <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas"
                               data-backdrop="false">
                                <div class="tile-icon">
                                    <img src="/backend/web/img/avatar3.jpg?1404026799" alt=""/>
                                </div>
                                <div class="tile-text">
                                    Mike Alba
                                    <small>123-123-3210</small>
                                </div>
                            </a>
                        </li>
                        <li class="tile divider-full-bleed">
                            <div class="tile-content">
                                <div class="tile-text"><strong>N</strong></div>
                            </div>
                        </li>
                        <li class="tile">
                            <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas"
                               data-backdrop="false">
                                <div class="tile-icon">
                                    <img src="/backend/web/img/avatar6.jpg?1404026572" alt=""/>
                                </div>
                                <div class="tile-text">
                                    Nathan Peterson
                                    <small>123-123-3210</small>
                                </div>
                            </a>
                        </li>
                        <li class="tile divider-full-bleed">
                            <div class="tile-content">
                                <div class="tile-text"><strong>P</strong></div>
                            </div>
                        </li>
                        <li class="tile">
                            <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas"
                               data-backdrop="false">
                                <div class="tile-icon">
                                    <img src="/backend/web/img/avatar7.jpg?1404026721" alt=""/>
                                </div>
                                <div class="tile-text">
                                    Philip Ericsson
                                    <small>123-123-3210</small>
                                </div>
                            </a>
                        </li>
                        <li class="tile divider-full-bleed">
                            <div class="tile-content">
                                <div class="tile-text"><strong>S</strong></div>
                            </div>
                        </li>
                        <li class="tile">
                            <a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas"
                               data-backdrop="false">
                                <div class="tile-icon">
                                    <img src="/backend/web/img/avatar10.jpg?1404026762" alt=""/>
                                </div>
                                <div class="tile-text">
                                    Samuel Parsons
                                    <small>123-123-3210</small>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div><!--end .offcanvas-body -->
            </div><!--end .offcanvas-pane -->
            <!-- END OFFCANVAS SEARCH -->

            <!-- BEGIN OFFCANVAS CHAT -->
            <div id="offcanvas-chat" class="offcanvas-pane style-default-light width-12">
                <div class="offcanvas-head style-default-bright">
                    <header class="text-primary">Chat with Ann Laurens</header>
                    <div class="offcanvas-tools">
                        <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                            <i class="md md-close"></i>
                        </a>
                        <a class="btn btn-icon-toggle btn-default-light pull-right" href="#offcanvas-search"
                           data-toggle="offcanvas" data-backdrop="false">
                            <i class="md md-arrow-back"></i>
                        </a>
                    </div>
                    <form class="form">
                        <div class="form-group floating-label">
                        <textarea name="sidebarChatMessage" id="sidebarChatMessage" class="form-control autosize"
                                  rows="1"></textarea>
                            <label for="sidebarChatMessage">Leave a message</label>
                        </div>
                    </form>
                </div>
                <div class="offcanvas-body">
                    <ul class="list-chats">
                        <li>
                            <div class="chat">
                                <div class="chat-avatar"><img class="img-circle"
                                                              src="/backend/web/img/avatar1.jpg?1403934956" alt=""/>
                                </div>
                                <div class="chat-body">
                                    Yes, it is indeed very beautiful.
                                    <small>10:03 pm</small>
                                </div>
                            </div><!--end .chat -->
                        </li>
                        <li class="chat-left">
                            <div class="chat">
                                <div class="chat-avatar"><img class="img-circle"
                                                              src="/backend/web/img/avatar9.jpg?1404026744" alt=""/>
                                </div>
                                <div class="chat-body">
                                    Did you see the changes?
                                    <small>10:02 pm</small>
                                </div>
                            </div><!--end .chat -->
                        </li>
                        <li>
                            <div class="chat">
                                <div class="chat-avatar"><img class="img-circle"
                                                              src="/backend/web/img/avatar1.jpg?1403934956" alt=""/>
                                </div>
                                <div class="chat-body">
                                    I just arrived at work, it was quite busy.
                                    <small>06:44pm</small>
                                </div>
                                <div class="chat-body">
                                    I will take look in a minute.
                                    <small>06:45pm</small>
                                </div>
                            </div><!--end .chat -->
                        </li>
                        <li class="chat-left">
                            <div class="chat">
                                <div class="chat-avatar"><img class="img-circle"
                                                              src="/backend/web/img/avatar9.jpg?1404026744" alt=""/>
                                </div>
                                <div class="chat-body">
                                    The colors are much better now.
                                </div>
                                <div class="chat-body">
                                    The colors are brighter than before.
                                    I have already sent an example.
                                    This will make it look sharper.
                                    <small>Mon</small>
                                </div>
                            </div><!--end .chat -->
                        </li>
                        <li>
                            <div class="chat">
                                <div class="chat-avatar"><img class="img-circle"
                                                              src="/backend/web/img/avatar1.jpg?1403934956" alt=""/>
                                </div>
                                <div class="chat-body">
                                    Are the colors of the logo already adapted?
                                    <small>Last week</small>
                                </div>
                            </div><!--end .chat -->
                        </li>
                    </ul>
                </div><!--end .offcanvas-body -->
            </div><!--end .offcanvas-pane -->
            <!-- END OFFCANVAS CHAT -->

        </div><!--end .offcanvas-->
        <!-- END OFFCANVAS RIGHT -->
    </div><!--end #base-->
    <!-- END BASE -->
<?php else: ?>
    <?php echo $content ?>
<?php endif; ?>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
