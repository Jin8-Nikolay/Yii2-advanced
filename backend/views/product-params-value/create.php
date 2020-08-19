<?php

use yii\helpers\Html;

$this->title = Yii::t('backend', 'Создать значение параметров продукта');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Значения параметров продукта'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-params-value-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
