<?php

use backend\helpers\StatusHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'role')->dropDownList(StatusHelper::roleUser()) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('backend', 'Сохранить'), ['class' => 'btn ink-reaction btn-flat btn-lg btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
