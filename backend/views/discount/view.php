<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Скидки'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


<p>
    <?= Html::a(Yii::t('backend', 'Обновить'), ['update', 'id' => $model->id], ['class' => 'btn ink-reaction btn-flat btn-primary']) ?>
    <?= Html::a(Yii::t('backend', 'Удалить'), ['delete', 'id' => $model->id], [
        'class' => 'btn ink-reaction btn-flat btn-danger',
        'data' => [
            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
            'method' => 'post',
        ],
    ]) ?>
</p>

<?= DetailView::widget([
    'model' => $model,
    'options' => [
        'class' => 'table table-banded',
    ],
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
    'attributes' => [
        'id',
        [
            'attribute' => 'title',
            'label' => Yii::t('backend', 'Заглавие'),
            'value' => function ($model) {
                return $model->title;
            }
        ],
        [
            'attribute' => 'value',
            'label' => Yii::t('backend', 'Стоимость'),
            'value' => function ($model) {
                return $model->value;
            }
        ],
    ],
]) ?>


