<?php

use yii\helpers\Html;



$this->title = Yii::t('backend', 'Создать категорию');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Категории'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
