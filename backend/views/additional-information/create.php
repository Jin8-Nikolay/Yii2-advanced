<?php

use yii\helpers\Html;



$this->title = Yii::t('backend', 'Создать дополнительную информацию');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Дополнительная информация'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="additional-information-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
