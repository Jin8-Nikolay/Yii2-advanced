<?php

use yii\helpers\Html;


$this->title = Yii::t('backend', 'Обновить продукт в параметрах: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Продукт в параметры'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновить');
?>
<div class="product-to-params-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
