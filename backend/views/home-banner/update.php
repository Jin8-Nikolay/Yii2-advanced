<?php

use yii\helpers\Html;


$this->title = Yii::t('backend', 'Обновить домашний баннер: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Главная Баннеры'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновить');
?>
<div class="home-banner-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
