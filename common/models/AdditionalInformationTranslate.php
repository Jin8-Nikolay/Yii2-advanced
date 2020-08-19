<?php

namespace common\models;

use Yii;


class AdditionalInformationTranslate extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'additional_information_translate';
    }

    public function rules()
    {
        return [
            [['name_information', 'value_information'], 'required'],
            [['name_information', 'value_information'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'additional_information_id' => Yii::t('backend', 'ID дополнительной информации'),
            'language' => Yii::t('backend', 'Язык'),
            'name_information' => Yii::t('backend', 'Имя Информация'),
            'value_information' => Yii::t('backend', 'Значение информации'),
        ];
    }

    public function getAdditionalInformation(){
        return $this->hasMany(AdditionalInformation::className(), ['id' => 'additional_information_id']);
    }
}
