<?php

namespace common\models;

use creocoder\translateable\TranslateableBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;


class Comments extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public static function tableName()
    {
        return 'comments';
    }


    public function rules()
    {
        return [
            [['product_id', 'email', 'name', 'star'], 'required'],
            [['product_id', 'status', 'pos', 'star', 'created_at', 'updated_at'], 'integer'],
            [['comment'], 'string'],
            [['email', 'name'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'product_id' => Yii::t('backend', 'Код товара'),
            'status' => Yii::t('backend', 'Статус'),
            'pos' => Yii::t('backend', 'Позиция'),
            'email' => Yii::t('backend', 'Эл. адрес'),
            'name' => Yii::t('backend', 'Название'),
            'comment' => Yii::t('backend', 'Комментарий'),
            'star' => Yii::t('backend', 'Звезда'),
            'created_at' => Yii::t('backend', 'Создано'),
            'updated_at' => Yii::t('backend', 'Обновлен'),
        ];
    }

    public static function findProductActive($id)
    {
        $result = self::find()->where(['product_id' => $id])->andWhere(['status' => true])->all();
        if (!$result) {
            return false;
        }
        return $result;
    }
}
