<?php

use yii\helpers\Html;



$this->title = Yii::t('app', 'Update Redirect: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Redirects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="redirect-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
