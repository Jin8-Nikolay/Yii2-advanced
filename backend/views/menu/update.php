<?php

use yii\helpers\Html;



$this->title = Yii::t('backend', 'Обновить меню: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Меню'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновить');
?>
<div class="menu-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
