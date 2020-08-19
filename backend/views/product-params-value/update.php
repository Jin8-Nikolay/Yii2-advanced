<?php

use yii\helpers\Html;


$this->title = Yii::t('backend', 'Обновить значение параметров продукта: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Значения параметров продукта'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновить');
?>
<div class="product-params-value-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
