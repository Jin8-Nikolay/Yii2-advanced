<?php
use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $addIn,
    'options' => [
        'tag' => false,
    ],
    'layout' => "{items}\n{pager}",
    'itemView' => '_item-addIn',
]);
?>