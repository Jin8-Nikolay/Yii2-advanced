<?php

use yii\widgets\LinkPager;
use yii\widgets\ListView;
use yii\widgets\Pjax;

?>
<?php Pjax::begin([
    'enablePushState' => false, // to disable push state
    'enableReplaceState' => false // to disable replace state
]); ?>
<?php
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'options' => [
        'tag' => false,
    ],
    'layout' => "{items}",
    'itemView' => '_item-productList',
]);
echo LinkPager::widget([
    'pagination' => $pages,
    'activePageCssClass' => 'current',
    'prevPageLabel' => false,
    'nextPageLabel' => false,

]);
?>
<?php Pjax::end(); ?>
