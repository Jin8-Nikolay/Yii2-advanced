<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserToOrder */

$this->title = Yii::t('backend', 'Create User To Order');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'User To Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-to-order-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
