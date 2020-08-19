<?php

namespace common\models;

use creocoder\translateable\TranslateableBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;


class ProductParams extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'translate' => [
                'class' => TranslateableBehavior::className(),
                'translationAttributes' => ['name']
            ]
        ];
    }

    public static function tableName()
    {
        return 'product_params';
    }


    public function rules()
    {
        return [
            [['category_id'], 'required'],
            [['category_id', 'status', 'pos'], 'integer'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'category_id' => Yii::t('backend', 'ID категории'),
            'status' => Yii::t('backend', 'Статус'),
            'pos' => Yii::t('backend', 'Позиция'),
            'created_at' => Yii::t('backend', 'Создано'),
            'updated_at' => Yii::t('backend', 'Обновлен'),
        ];
    }

    public function getTranslations(){
        return $this->hasMany(ProductParamsTranslate::className(), ['product_params_id' => 'id']);
    }

    public static function findActive(){
        return self::find()->where(['status' => true])->all();
    }

    public static function findActiveByCategory($category_id)
    {
        return self::find()
            ->where(['status' => true])
            ->andWhere(['category_id'=> $category_id])
            ->all();
    }
}
