<?php
use yii\widgets\ListView;

echo ListView::widget([
    'dataProvider' => $product,
    'layout' => "{items}\n{pager}",
    'itemView' => '_item-productFeature',
]);
?>