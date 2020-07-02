<?php

use yii\helpers\Html;


$this->title = Yii::t('backend', 'Create Menu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
