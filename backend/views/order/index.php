<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


$this->title = Yii::t('backend', 'Заказы');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php Pjax::begin(); ?>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'summary' => Yii::t('backend', 'Отображено {begin} - из {totalCount} элементов'),
    'tableOptions' => [
        'class' => 'table table-banded',
    ],
    'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
    'layout' => "{items}\n{summary}",
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'user_id',
        'name',
        'surname',
        'patronymic',
        //'phone',
        //'email:email',
        //'total',
        //'count',
        //'status',
        //'content:ntext',
        //'delivery_id',
        //'payment_id',
        //'ip',
        //'system_info:ntext',
        //'hash',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>

<?php Pjax::end(); ?>


