<?php

use common\models\Language;
use common\models\MainCategory;
use common\models\MainCategoryTranslate;
use iutbay\yii2\mm\widgets\MediaManagerInputModal;
use iutbay\yii2\mm\widgets\MediaManagerInput;
use yii\bootstrap\Tabs;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use backend\helpers\StatusHelper;

$languages = Language::findActive();
?>

<div class="category-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'main_category_id')
        ->dropDownList(ArrayHelper::map(MainCategory::findActive(), 'id', 'title'))?>

    <?= $form->field($model, 'status')->dropDownList(StatusHelper::statusList()) ?>

    <?= $form->field($model, 'index')->textInput() ?>

    <?= $form->field($model, 'images')->widget(MediaManagerInput::className(), [
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
        <?= Html::submitButton(Yii::t('backend', 'Save'), ['class' => 'btn ink-reaction btn-flat btn-lg btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>