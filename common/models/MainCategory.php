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
                'translationAttributes' => ['title', 'meta_tag']
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
            [['alias'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'status' => Yii::t('backend', 'Статус'),
            'index' => Yii::t('backend', 'Индекс'),
            'created_at' => Yii::t('backend', 'Создано'),
            'updated_at' => Yii::t('backend', 'Обновлен'),
            'alias' => Yii::t('backend', 'Alias'),
        ];
    }

    public function getTranslations(){
        return $this->hasMany(MainCategoryTranslate::className(), ['main_category_id' => 'id']);
    }

    public function getCategories(){
        return $this->hasMany(Category::className(), ['main_category_id' => 'id']);
    }

    public static function findActive()
    {
        return self::find()->where(['status' => self::$statusActive])->all();
    }
}
