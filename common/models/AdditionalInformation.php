<?php

namespace common\models;

use creocoder\translateable\TranslateableBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;


class AdditionalInformation extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'translate' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['name_information', 'value_information',]
            ]
        ];
    }

    public static function tableName()
    {
        return 'additional_information';
    }


    public function rules()
    {
        return [
            [['product_id', 'status'], 'required'],
            [['product_id', 'status'], 'integer'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'product_id' => Yii::t('backend', 'Код товара'),
            'status' => Yii::t('backend', 'Статус'),
            'created_at' => Yii::t('backend', 'Создано'),
            'updated_at' => Yii::t('backend', 'Обновлен'),
        ];
    }

    public function getTranslations(){
        return $this->hasMany(AdditionalInformationTranslate::className(), ['additional_information_id' => 'id']);
    }

}
