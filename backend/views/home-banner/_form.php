<?php

use backend\helpers\StatusHelper;
use common\models\Language;
use common\models\Product;
use iutbay\yii2\mm\widgets\MediaManagerInput;
use yii\bootstrap\Tabs;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$languages = Language::findActive()
?>

<div class="home-banner-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList(StatusHelper::statusList()) ?>

    <?= $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Product::find()->where(['>', 'discount_id', 0])->all(),'id','short_content')) ?>

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

    <?= $form->field($model, 'pos')->textInput() ?>

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
