<?php

use yii\helpers\Html;



$this->title = Yii::t('backend', 'Обновить главную категорию: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Основные категории'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновить');
?>
<div class="main-category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
