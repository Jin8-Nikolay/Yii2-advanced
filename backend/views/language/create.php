<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Language */

$this->title = Yii::t('backend', 'Создать язык');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Языки'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
