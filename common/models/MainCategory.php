<?php

namespace common\models;

use creocoder\translateable\TranslateableBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;


class MainCategory extends \yii\db\ActiveRecord
{
    public static $statusActive = 1;

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'translate' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['title']
            ]
        ];
    }

    public static function tableName()
    {
        return 'main_category';
    }

    public function rules()
    {
        return [
            [['status', 'index'], 'required'],
            [['status', 'index'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'status' => Yii::t('backend', 'Status'),
            'index' => Yii::t('backend', 'Index'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
        ];
    }

    public function getTranslations(){
        return $this->hasMany(MainCategoryTranslate::className(), ['main_category_id' => 'id']);
    }

    public static function findActive()
    {
        return self::find()->where(['status' => self::$statusActive])->all();
    }
}
