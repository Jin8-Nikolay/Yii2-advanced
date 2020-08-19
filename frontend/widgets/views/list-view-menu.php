<?php
use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $category,
    'options' => [
        'tag' => false,
    ],
    'layout' => "{items}\n{pager}",
    'itemView' => '_item-menu',
]);
?>