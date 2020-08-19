<?php

use yii\helpers\Html;

$this->title = Yii::t('backend', 'Создать редирект');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Перенаправление'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="redirect-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
