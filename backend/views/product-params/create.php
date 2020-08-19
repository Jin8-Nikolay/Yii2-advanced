<?php

use yii\helpers\Html;


$this->title = Yii::t('backend', 'Создать параметры продукта');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Параметры продукта'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-params-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
