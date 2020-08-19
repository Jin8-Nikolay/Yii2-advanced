<?php
use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $banners,
    'options' => [
        'tag' => false,
    ],
    'layout' => "{items}\n{pager}",
    'itemView' => '_item-banner',
]);
?>