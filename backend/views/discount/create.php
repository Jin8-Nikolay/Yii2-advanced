<?php

use yii\helpers\Html;


$this->title = Yii::t('backend', 'Создать скидку');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Скидки'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discount-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
