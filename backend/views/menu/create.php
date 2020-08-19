<?php

use yii\helpers\Html;


$this->title = Yii::t('backend', 'Создать меню');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Меню'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
