<?php
use frontend\widgets\AdditionalInformationWidget;
use frontend\widgets\CommentsWidget;

?>

<div class="tab-content">
    <div class="tab-pane active" id="description">
        <p><?php echo $model->content; ?></p>
        <div class="meta-row">
            <div class="inline">
                <label>SKU:</label>
                <span>54687621</span>
            </div><!-- /.inline -->

            <span class="seperator">/</span>

            <div class="inline">
                <?php if ($model->discount_id !== null): ?>
                    <span><a href="#">-<?php echo $model->discount->title ?></a>,</span>
                <?php endif; ?>
            </div><!-- /.inline -->

            <span class="seperator">/</span>

            <div class="inline">
                <label>tag:</label>
                <span><a href="#">fast</a>,</span>
                <span><a href="#">gaming</a>,</span>
                <span><a href="#">strong</a></span>
            </div><!-- /.inline -->
        </div><!-- /.meta-row -->
    </div><!-- /.tab-pane #description -->

    <div class="tab-pane" id="additional-info">
        <ul class="tabled-data">
            <?php echo AdditionalInformationWidget::widget(['id' => $model->id]) ?>
        </ul><!-- /.tabled-data -->

        <div class="meta-row">
            <div class="inline">
                <label>SKU:</label>
                <span>54687621</span>
            </div><!-- /.inline -->

            <span class="seperator">/</span>

            <div class="inline">
                <label><?php echo Yii::t('frontend', 'Категории')?>:</label>
                <?php if ($model->discount_id !== null): ?>
                    <span><a href="#">-<?php echo $model->discount->title ?></a>,</span>
                <?php endif; ?>
            </div><!-- /.inline -->
        </div><!-- /.meta-row -->
    </div><!-- /.tab-pane #additional-info -->
    <div class="tab-pane" id="reviews">
        <?php echo CommentsWidget::widget(['product_id' => $model->id]) ?>
    </div><!-- /.tab-pane #reviews -->
</div><!-- /.tab-content -->
