<?php

namespace common\models;

use Yii;


class PaymentTranslate extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'payment_translate';
    }


    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'language' => Yii::t('backend', 'Язык'),
            'payment_id' => Yii::t('backend', 'Идентификатор платежа'),
            'name' => Yii::t('backend', 'Название'),
            'description' => Yii::t('backend', 'Описание'),
        ];
    }

    public function getPayment(){
        return $this->hasOne(Payment::className(), ['id' => 'payment_id']);
    }
}
