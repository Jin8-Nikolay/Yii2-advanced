<?php

use yii\helpers\Html;



$this->title = Yii::t('backend', 'Создать платеж');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Платежи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
