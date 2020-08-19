<?php

namespace common\models;

use Yii;


class DeliveryTranslate extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'delivery_translate';
    }


    public function rules()
    {
        return [
            [['delivery_id'], 'integer'],
            [['name'], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'language' => Yii::t('backend', 'Язык'),
            'delivery_id' => Yii::t('backend', 'Идентификатор доставки'),
            'name' => Yii::t('backend', 'Название'),
            'description' => Yii::t('backend', 'Описание'),
            'price' => Yii::t('backend', 'Цена'),
        ];
    }

    public function getDelivery(){
        return $this->hasOne(Delivery::className(), ['id' => 'delivery_id']);
    }
}
