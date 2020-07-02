<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>
    <?php if ($model->scenario == 'update'): ?>
        <div class="dd" id="domenu-1">
            <button id="domenu-add-item-btn" class="dd-new-item" onclick="return false">+</button>
            <!-- .dd-item-blueprint is a template for all .dd-item's -->
            <li class="dd-item-blueprint">
                <!-- @migrating-from 0.48.59 button container -->
                <button class="collapse" data-action="collapse" type="button" style="display: none;" onclick="return false">–</button>
                <button class="expand" data-action="expand" type="button" style="display: none;" onclick="return false">+</button>
                <div class="dd-handle dd3-handle">Drag</div>
                <div class="dd3-content">
                    <span class="item-name">[item_name]</span>
                    <!-- @migrating-from 0.13.29 button container-->
                    <!-- .dd-button-container will hide once an item enters the edit mode -->
                    <div class="dd-button-container">
                        <!-- @migrating-from 0.13.29 add button-->
                        <button class="custom-button-example" onclick="return false">&#x270E;</button>
                        <button class="item-add" onclick="return false">+</button>
                        <button class="item-remove" data-confirm-class="item-remove-confirm" onclick="return false">&times;</button>
                    </div>
                    <!-- Inside of .dd-edit-box you can add your custom input fields -->
                    <div class="dd-edit-box" style="display: none;">
                        <!-- data-placeholder has a higher priority than placeholder -->
                        <!-- data-placeholder can use token-values; when not present will be set to "" -->
                        <!-- data-default-value specifies a default value for the input; when not present will be set to "" -->
                        <input type="text" name="title" autocomplete="off" placeholder="Item"
                               data-placeholder="Any nice idea for the title?"
                               data-default-value="doMenu List Item. {?numeric.increment}">
                        <select name="custom-select">
                            <option>select something...</option>
                            <optgroup label="Pages">
                                <option value="1">http://example.com/page/1</option>
                                <option value="2">http://example.com/page/2</option>
                            </optgroup>
                            <optgroup label="Categories">
                                <option value="3">News</option>
                                <option value="4">Stories</option>
                            </optgroup>
                        </select>
                        <!-- @migrating-from 0.13.29 an element ".end-edit" within ".dd-edit-box" exists the edit mode on click -->
                        <i class="end-edit">save</i>
                    </div>
                </div>
            </li>

            <ol class="dd-list"></ol>
        </div>

        <div id="domenu-1-output" class="output-preview-container">
            <?= $form->field($model, 'content')->hiddenInput(['rows' => 6, 'class' => 'jsonOutput'])->label(false) ?>
        </div>
    <?php else: ?>
        <?= $form->field($model, 'content')->hiddenInput(['class' => 'jsonOutput', 'value' => '[{"id":10,"title":"Главная","customSelect":"/","__domenu_params":{},"select2ScrollPosition":{"x":0,"y":0}}]', ])->label(false) ?>
    <?php endif; ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn ink-reaction btn-flat btn-lg btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
