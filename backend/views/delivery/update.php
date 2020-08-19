<?php

use yii\helpers\Html;

$this->title = Yii::t('backend', 'Обновить доставку: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Поставки'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновить');
?>
<div class="delivery-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
