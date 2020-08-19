<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdditionalInformation */

$this->title = Yii::t('backend', 'Обновить дополнительную информацию: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Дополнительная информация'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновить');
?>
<div class="additional-information-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
