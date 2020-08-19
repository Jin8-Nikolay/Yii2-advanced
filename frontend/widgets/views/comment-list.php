<?php

use yii\widgets\ListView;

?>
<?php echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_item-comment-list',
    'viewParams' => ['comment' => $comment, 'product_id' => $product_id],
    'layout' => "{items}",
    'emptyText' => '',
    ]);
?>

