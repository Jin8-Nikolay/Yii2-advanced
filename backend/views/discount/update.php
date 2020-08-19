<?php

use yii\helpers\Html;


$this->title = Yii::t('backend', 'Обновить скидку: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Скидки'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновить');
?>
<div class="discount-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
