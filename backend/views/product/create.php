<?php

use yii\helpers\Html;


$this->title = Yii::t('backend', 'Создать продукт');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Товары'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
