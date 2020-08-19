<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


$this->title = Yii::t('backend', 'Перенаправление');
$this->params['breadcrumbs'][] = $this->title;
?>

    <p>
        <?= Html::a(Yii::t('backend', 'Создать редирект'), ['create'], ['class' => 'btn ink-reaction btn-flat btn-lg btn-primary']) ?>
    </p>

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
            'from',
            'to',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>


