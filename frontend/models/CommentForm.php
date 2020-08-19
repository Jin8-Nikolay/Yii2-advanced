<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Comments;

class CommentForm extends Model
{
    public $product_id;
    public $star;
    public $email;
    public $name;
    public $comment;
    public $status;

    public function rules()
    {
        return [
            [['email', 'name', 'comment', 'star'], 'string'],
            [['email'], 'email', 'message' => '{attribute}' . Yii::t('frontend', 'Невірний формат')],
            [['email', 'name', 'comment'], 'required'],
            [['product_id', 'star'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'email' => Yii::t('frontend', 'Email'),
            'name' => Yii::t('frontend', 'Имя'),
            'comment' => Yii::t('frontend', 'Комментарий'),
            'star' => Yii::t('frontend', 'Рейтинг'),
        ];
    }

    public function create()
    {

        if (!$this->validate()) {
            return false;
        }
        $model = new Comments();
        $model->product_id = $this->product_id;
        $model->email = $this->email;
        $model->name = $this->name;
        $model->comment = $this->comment;
        $model->star = $this->star;
        $model->save(false);
        return true;
    }
}

?>