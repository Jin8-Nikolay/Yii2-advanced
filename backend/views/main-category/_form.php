<?php

use backend\helpers\StatusHelper;
use common\models\Language;
use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$languages = Language::findActive();
?>

<div class="main-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList(StatusHelper::statusList()) ?>

    <?= $form->field($model, 'index')->textInput() ?>

    <?= $form->field($model, 'alias')->textInput() ?>

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
