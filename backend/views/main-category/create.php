<?php

use yii\helpers\Html;



$this->title = Yii::t('app', 'Create Main Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Main Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-category-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
