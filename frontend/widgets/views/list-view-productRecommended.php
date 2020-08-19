<?php

use yii\widgets\LinkPager;
use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $product,
    'options' => [
        'tag' => false,
    ],
    'layout' => "{items}\n{pager}",
    'itemView' => '_item-productRecommended',
]);
?>

