<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


$this->title = Yii::t('backend', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>


<p>
    <?= Html::a(Yii::t('backend', 'Create Product'), ['create'], ['class' => 'btn ink-reaction btn-flat btn-lg btn-primary']) ?>
</p>

<?php echo Html::beginForm(['/product/checkbox'], 'post') ?>
<?php Pjax::begin(); ?>
<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'summary' => Yii::t('admin', 'Отображено {begin} - из {totalCount} элементов'),
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
        'category_id',
        'price',
        'created_at',
        'updated_at',
        //'status',
        //'image:ntext',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>

<?php echo Html::dropDownList('action', '', [
    '' => 'Выберите действия',
    'noactive' => 'Снять с публикации',
    'inactive' => 'Опубликовать',
    'delete' => 'Удалить'
]) ?>
<?php echo Html::submitButton('Применить', ['class' => 'btn btn-primary']) ?>
<?php Pjax::end(); ?>
<?php Html::endForm(); ?>


