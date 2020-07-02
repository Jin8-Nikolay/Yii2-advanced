<?php

namespace common\models;

use creocoder\translateable\TranslateableBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;


class Category extends \yii\db\ActiveRecord
{
    public static $statusActive = 1;
    public static $add = 1;
    public static $subtract = 1;
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
        return 'category';
    }


    public function rules()
    {
        return [
            [['main_category_id', 'status', 'index'], 'required'],
            [['main_category_id', 'status', 'index'], 'integer'],
            [['images'], 'string'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'main_category_id' => Yii::t('backend', 'Main Category ID'),
            'status' => Yii::t('backend', 'Status'),
            'index' => Yii::t('backend', 'Index'),
            'count_product' => Yii::t('backend', 'Count Product'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'images' => Yii::t('backend', 'Images'),
        ];
    }

    public static function findActive(){
        return self::find()->where(['status' => self::$statusActive])->all();
    }

    public function getTranslations(){
        return $this->hasMany(CategoryTranslate::className(), ['category_id' => 'id']);
    }

    public static function addCount($id){
        $model = self::find()->where(['id' => $id])->one();
        $model->count_product += self::$add;
        $model->save();
    }
    public static function subtractCount($id){
        $model = self::find()->where(['id' => $id])->one();
        $model->count_product -= self::$subtract;
        $model->save();
    }
}
