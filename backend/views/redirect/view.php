<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Redirect */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Перенаправление'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


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
    'options' => [
        'class' => 'table table-banded',
    ],
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
    'attributes' => [
        'id',
        'from',
        'to',
        'status',
    ],
]) ?>


