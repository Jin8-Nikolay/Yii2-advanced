<?php

use yii\helpers\Html;


$this->title = Yii::t('backend', 'Создать доставку');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Поставки'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
