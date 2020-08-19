<?php

namespace frontend\widgets;

use common\models\Comments;
use Yii;
use yii\base\Widget;
use frontend\models\CommentForm;
use yii\data\ActiveDataProvider;

class CommentsWidget extends Widget
{
    public $product_id;
    public $pageSize = 10;
    public function init()
    {
        $comment = new CommentForm();
        $product_id = $this->product_id;
        $dataProvider = new ActiveDataProvider([
            'query' => Comments::find()
                ->where(['product_id' => $product_id])
                ->andWhere(['status' => true])
                ->orderBy('created_at DESC'),
            'pagination' => [
                'pageSize' => $this->pageSize,
            ]
        ]);
        echo $this->render('comment-list', compact('comment', 'dataProvider', 'product_id'));
        echo $this->render('comment-form', compact('comment', 'product_id'));

    }
}

?>