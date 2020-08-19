<?php

namespace common\models;

use Yii;


class HomeBannerTranslate extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'home_banner_translate';
    }


    public function rules()
    {
        return [
            [['big_text', 'excerpt', 'small_text'], 'required'],
            [['big_text', 'excerpt', 'small_text'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'language' => Yii::t('backend', 'Язык'),
            'home_banner_id' => Yii::t('backend', 'Идентификатор домашнего баннера'),
            'big_text' => Yii::t('backend', 'Большой текст'),
            'excerpt' => Yii::t('backend', 'Выдержка'),
            'small_text' => Yii::t('backend', 'Маленький текст'),
        ];
    }

    public function getBanner(){
        return $this->hasOne(HomeBanner::className(),['id' => 'home_banner_id']);
    }
}
