<?php

use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

?>
<div class="add-review row">
    <div class="col-sm-8 col-xs-12">
        <div class="new-review-form">
            <h2><?php echo Yii::t('frontend', 'Добавить отзыв')?></h2>
            <?php
            $form = ActiveForm::begin([
                'action' => Url::to(['/comment/add']),
                'id' => 'comment-form',
                'class' => 'contact-form'
            ]); ?>
            <?php echo $form->field($comment, 'product_id')->hiddenInput(['value' => $product_id])->label(false); ?>
            <div class="row field-row">
                <div class="col-xs-12 col-sm-6">
                    <?php echo $form->field($comment, 'name')->textInput(['class' => 'le-input']); ?>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <?php echo $form->field($comment, 'email')->textInput(['class' => 'le-input']); ?>
                </div>
            </div>
            <div class="field-row star-row">
                <div class="star-list">
                    <?php echo $form->field($comment, 'star')->widget(StarRating::classname(), [
                            'pluginOptions' => ['step' => 0.1]
                    ]);?>
                </div>
<!--                <div class="star-holder inline">-->
<!--                    <div class="star" data-score="3" style="cursor: pointer; width: 80px;">-->
<!--                        <img src="../../images/star-on.png" alt="1" title="bad">-->
<!--                        <input type="hidden"-->
<!--                               name="score" value="3">-->
<!--                    </div>-->
<!--                </div>-->
            </div>
            <div class="field-row">
                <?php echo $form->field($comment, 'comment')->textarea(['class' => 'le-input']); ?>
            </div>

            <div class="buttons-holder">
                <?php echo Html::submitButton(Yii::t('frontend', 'Добавить'), ['class' => 'le-button huge']); ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>