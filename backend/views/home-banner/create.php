<?php

use yii\helpers\Html;



$this->title = Yii::t('backend', 'Создать домашний баннер');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Главная Баннеры'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-banner-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
