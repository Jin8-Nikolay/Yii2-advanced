<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


$this->title = Yii::t('backend', 'Товары');
$this->params['breadcrumbs'][] = $this->title;
?>


<p>
    <?= Html::a(Yii::t('backend', 'Создать продукт'), ['create'], ['class' => 'btn ink-reaction btn-flat btn-lg btn-primary']) ?>
</p>

<?php echo Html::beginForm(['/product/checkbox'], 'post') ?>
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
            'checkboxOptions' => function ($model) {
                return ['value' => $model->id];
            }
        ],

        'id',
        [
            'attribute' => 'header',
            'label' => Yii::t('backend', 'Заголовок'),
            'value' => function ($model) {
                return $model->header;
            }
        ],
        [
            'attribute' => 'short_content',
            'label' => Yii::t('backend', 'Краткое содержание'),
            'value' => function ($model) {
                return $model->short_content;
            }
        ],
        [
            'format' => 'html',
            'label' => 'Фото',
            'value' => function ($data) {
                $image = $data->getImages($data->image);
                return Html::img($data->getImage($image[0]), ['height' => 155, 'width' => 110]);
            }
        ],
        //'status',
        //'image:ntext',

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


