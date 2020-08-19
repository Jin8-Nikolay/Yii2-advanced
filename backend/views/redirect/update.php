<?php

use yii\helpers\Html;



$this->title = Yii::t('backend', 'Обновление редиректа: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Перенаправление'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновить');
?>
<div class="redirect-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
