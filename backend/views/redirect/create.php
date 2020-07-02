<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Create Redirect');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Redirects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="redirect-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
