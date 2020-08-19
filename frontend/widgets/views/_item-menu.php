<?php
use yii\helpers\Url;

?>

<li><a href="<?php echo Url::toRoute(['/category/' . $model->alias])?>" class="menu-item-text"><?php echo $model->title?></a></li>

