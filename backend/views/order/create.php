<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = Yii::t('backend', 'Создать заказ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Заказы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
