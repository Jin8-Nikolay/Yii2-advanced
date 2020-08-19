<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Language */

$this->title = Yii::t('backend', 'Обновить язык: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Языки'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Обновить');
?>
<div class="language-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
