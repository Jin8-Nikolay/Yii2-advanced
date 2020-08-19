<?php

use yii\helpers\Html;



$this->title = Yii::t('app', 'Создать главную категорию');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Основные категории'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-category-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
