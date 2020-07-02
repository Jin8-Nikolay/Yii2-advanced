<?php

namespace common\models;

use Yii;


class Language extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'language';
    }


    public function rules()
    {
        return [
            [['code', 'locale', 'title'], 'required'],
            [['status', 'pos'], 'integer'],
            [['code', 'locale', 'title', 'icon'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'code' => Yii::t('backend', 'Code'),
            'locale' => Yii::t('backend', 'Locale'),
            'title' => Yii::t('backend', 'Title'),
            'icon' => Yii::t('backend', 'Icon'),
            'status' => Yii::t('backend', 'Status'),
            'pos' => Yii::t('backend', 'Pos'),
        ];
    }

    public static function findActive(){
        return self::find()->where(['status' => true])->all();
    }
}
