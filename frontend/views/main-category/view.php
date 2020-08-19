<?php
use common\components\MenuBuilder;
use yii\widgets\ListView;
$this->title = ''.$model->meta_tag.'';
$this->params['breadcrumbs'][] = $this->title;
$this->params['flag'] = true;
$this->params['main_category'] = true;
?>

<div id="top-banner-and-menu">
    <div class="container">
        <div class="col-xs-12 col-sm-8 col-md-9 homebanner-holder">
            <div id="hero">
                <div class="grid-list-products">
                    <div class="tab-content">
                        <div class="title-nav">
                            <h2 class="inverse"><?php echo $model->title?></h2>
                        </div>
                        <div id="grid-view" class="products-grid fade tab-pane in active">
                            <div class="product-grid-holder">
                                <div class="row no-margin">
                                    <?php echo ListView::widget([
                                        'dataProvider' => $category,
                                        'layout' => "{items}\n{pager}",
                                        'itemView' => '_item',
                                    ]);
                                    ?>
                                </div><!-- /.row -->
                            </div><!-- /.product-grid-holder -->
                        </div><!-- /.products-grid #grid-view -->
                    </div><!-- /.tab-content -->
                </div><!-- /.grid-list-products -->

            </div><!-- /#gaming -->
        </div><!-- /.col -->
        <!-- ========================================= CONTENT : END ========================================= -->
    </div><!-- /.container -->
</div>
