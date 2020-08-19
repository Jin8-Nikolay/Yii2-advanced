<?php

namespace common\models;

use creocoder\translateable\TranslateableBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;


class ProductParamsValue extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'translate' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['value'],
                'translationRelation' => 'translations'
            ]
        ];
    }

    public static function tableName()
    {
        return 'product_params_value';
    }


    public function rules()
    {
        return [
            [['product_params_id', 'status'], 'required'],
            [['product_params_id', 'status'], 'integer'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'product_params_id' => Yii::t('backend', 'Идентификатор параметров продукта'),
            'status' => Yii::t('backend', 'Статус'),
            'created_at' => Yii::t('backend', 'Создано'),
            'updated_at' => Yii::t('backend', 'Обновлен'),
        ];
    }

    public function getTranslations(){
        return $this->hasMany(ProductParamsValueTranslate::className(), ['product_params_value_id' => 'id']);
    }

    public static function findActive(){
        return self::find()->where(['status' => true])->all();
    }

    public static function findByParams($id){
        return self::find()->where(['product_params_id' => $id])->all();
    }
}
