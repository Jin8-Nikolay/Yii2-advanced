<?php

use yii\helpers\Html;


$this->title = Yii::t('backend', 'Update Order Item: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Пункты заказа'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="order-item-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
