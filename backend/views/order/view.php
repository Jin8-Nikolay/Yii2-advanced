<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Заказы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Обновить'), ['update', 'id' => $model->id], ['class' => 'btn ink-reaction btn-flat btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Удалить'), ['delete', 'id' => $model->id], [
            'class' => 'btn ink-reaction btn-flat btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Вы уверены, что хотите удалить этот элемент?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'name',
            'surname',
            'patronymic',
            'phone',
            'email:email',
            'total',
            'count',
            'status',
            'content:ntext',
            'delivery_id',
            'payment_id',
            'ip',
            'system_info:ntext',
            'hash',
        ],
    ]) ?>

</div>
