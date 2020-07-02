<?php

use yii\helpers\Html;



$this->title = Yii::t('backend', 'Update Main Category: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Main Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="main-category-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
