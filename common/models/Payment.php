<?php

namespace common\models;

use creocoder\translateable\TranslateableBehavior;
use Yii;


class Payment extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            'translate' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['name', 'description']
            ]
        ];
    }

    public static function tableName()
    {
        return 'payment';
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
        return $this->hasMany(PaymentTranslate::className(), ['payment_id' => 'id']);
    }

    public static function getActive(){
        return self::find()->where(['status' => true])->all();
    }

    public function getName2(){
        return $this->name.'-'.$this->description;
    }
}
