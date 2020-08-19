<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('backend', 'Основные категории');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= Html::a(Yii::t('backend', 'Создать главную категорию'), ['create'], ['class' => 'btn ink-reaction btn-flat btn-lg btn-primary']) ?>

<?php echo Html::beginForm(['/main-category/checkbox'], 'post') ?>
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
        [
            'class' => 'yii\grid\CheckboxColumn',
            'options' => ['width' => '10px'],
            'checkboxOptions' => function ($model, $key, $index, $column) {
                return ['value' => $model->id];
            }
        ],

        'id',
        'status',
        'index',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>

<?php echo Html::dropDownList('action', '', [
    '' => ''.Yii::t('backend', 'Выберите действие').'',
    'noactive' => ''.Yii::t('backend', 'Снять с публикации').'',
    'inactive' => ''.Yii::t('backend', 'Опубликовать').'',
    'delete' => ''.Yii::t('backend', 'Удалить').'',
]) ?>
<?php echo Html::submitButton(''.Yii::t('backend', 'Применить').'', ['class' => 'btn ink-reaction btn-flat btn-lg btn-primary']) ?>
<?php Pjax::end(); ?>
<?php Html::endForm(); ?>


