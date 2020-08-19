<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Comments;

?>
<div class="comments">
    <div class="comment-item">
        <div class="row no-margin">
            <div class="col-lg-1 col-xs-12 col-sm-2 no-margin">
                <div class="avatar">
                    <img alt="avatar" src="../../images/default-avatar.jpg">
                </div>
            </div>
            <div class="col-xs-12 col-lg-11 col-sm-10 no-margin">
                <div class="comment-body">
                    <div class="meta-info">
                        <div class="author inline">
                            <a href="#" class="bold"><?php echo $model->name ?></a>
                        </div>
                        <div class="star-holder inline">
                            <div class="star" data-score="<?= $model->star ?>"></div>
                        </div>
                        <div class="date inline pull-right">
                            <?php echo date('d.m.Y', $model->created_at) ?>
                        </div>
                    </div>
                    <p class="comment-text">
                        <?php echo $model->comment ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>