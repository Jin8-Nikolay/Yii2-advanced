<?php

use common\models\Product;
use common\models\ProductParamsValue;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<div class="product-to-params-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_params_value_id')->dropDownList(ArrayHelper::map(ProductParamsValue::findActive(), 'id', 'value')) ?>

    <?= $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Product::findActive(), 'id', 'short_content')) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Сохранить'), ['class' => 'btn ink-reaction btn-flat btn-lg btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
