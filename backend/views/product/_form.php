<?php

use backend\helpers\StatusHelper;
use common\models\Category;
use common\models\Discount;
use common\models\Language;
use iutbay\yii2\mm\widgets\MediaManagerInput;
use yii\bootstrap\Tabs;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$languages = Language::findActive();
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')
        ->dropDownList(ArrayHelper::map(Category::findActive(), 'id', 'title')) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(StatusHelper::statusList()) ?>

    <?= $form->field($model, 'image')->widget(MediaManagerInput::className(), [
        'multiple' => true,
        'clientOptions' => [
            'api' => [
                'listUrl' => Url::to(['/mm/api/list']),
                'uploadUrl' => Url::to(['/mm/api/upload']),
                'downloadUrl' => Url::to(['/mm/api/download']),
            ],
        ],
    ]);
    ?>

    <?= $form->field($model, 'is_recommend')->dropDownList([
        '0' => 'Нерекомендуемый',
        '1' => 'Рекомендуемый',
    ]) ?>

    <?= $form->field($model, 'is_new')->dropDownList([
        '0' => 'Не новый',
        '1' => 'Новый',
    ]) ?>

    <?= $form->field($model, 'bestseller')->dropDownList([
        '0' => 'Не бестселлер',
        '1' => 'Бестселлер',
    ]) ?>

    <?= $form->field($model, 'out_of_stock')->dropDownList([
        '0' => 'Есть в наличии',
        '1' => 'Распродано',
    ]) ?>

    <?= $form->field($model, 'discount_id')->dropDownList([
        '0' => 'Нету',
        ArrayHelper::map(Discount::find()->all(), 'id', 'title')
    ]) ?>

    <?php
    $items = [];
    if ($languages) {
        $count = 0;
        foreach ($languages as $language) {
            $items[] = [
                'label' => $language->code,
                'content' => $this->render('_translate-field', compact('form', 'model', 'language')),
                'active' => ($count === 0) ? true : false,
            ];
            $count++;
        }
    }
    echo Tabs::widget([
        'items' => $items
    ])
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Сохранить'), ['class' => 'btn ink-reaction btn-flat btn-lg btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
