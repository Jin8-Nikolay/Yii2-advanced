<?php

use yii\helpers\Html;


$this->title = Yii::t('backend', 'Создать продукт в параметры');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Продукт в параметры'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-to-params-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
