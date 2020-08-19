<?php

use yii\helpers\Html;


$this->title = Yii::t('backend', 'Обновить параметры продукта: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Параметры продукта'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновить');
?>
<div class="product-params-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
