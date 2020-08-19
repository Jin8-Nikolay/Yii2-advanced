<?php

use yii\helpers\Html;


$this->title = Yii::t('backend', 'Обновление пользователя: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Пользователи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновить');
?>
<div class="users-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
