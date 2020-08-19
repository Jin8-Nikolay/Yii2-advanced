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
            'code' => Yii::t('backend', 'Код'),
            'locale' => Yii::t('backend', 'Место действия'),
            'title' => Yii::t('backend', 'Заглавие'),
            'icon' => Yii::t('backend', 'Значок'),
            'status' => Yii::t('backend', 'Статус'),
            'pos' => Yii::t('backend', 'Позиция'),
        ];
    }

    public static function findActive(){
        return self::find()->where(['status' => true])->all();
    }
}
