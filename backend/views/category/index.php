<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use backend\helpers\CheckBoxHelper;

$this->title = Yii::t('backend', 'Categories');
$this->params['breadcrumbs'][] = $this->title;
?>


<?= Html::a(Yii::t('backend', 'Create Category'), ['create'], ['class' => 'btn ink-reaction btn-flat btn-lg btn-primary']) ?>


<?php echo Html::beginForm(['/category/checkbox'], 'post') ?>
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
        'main_category_id',
        'status',
        'index',
        //'count_product',
        //'created_at',
        //'updated_at',
        //'images:ntext',

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


