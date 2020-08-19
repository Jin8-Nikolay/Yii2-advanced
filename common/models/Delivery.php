<?php

namespace common\models;

use creocoder\translateable\TranslateableBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;


class Delivery extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'translate' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['name', 'description', 'price']
            ]
        ];
    }

    public static function tableName()
    {
        return 'delivery';
    }


    public function rules()
    {
        return [
            [['status', 'pos'], 'integer'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'status' => Yii::t('backend', 'Статус'),
            'pos' => Yii::t('backend', 'Позиция'),
        ];
    }

    public function getTranslations(){
        return $this->hasMany(DeliveryTranslate::className(), ['delivery_id' => 'id']);
    }

    public static function getActive(){
        return self::find()->where(['status' => true])->all();
    }

    public function getName2(){
        return $this->name.'-'.$this->price;
    }
}
