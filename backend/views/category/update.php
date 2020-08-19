<?php

use yii\helpers\Html;



$this->title = Yii::t('backend', 'Обновить категорию: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Категории'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновить');
?>
<div class="category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
