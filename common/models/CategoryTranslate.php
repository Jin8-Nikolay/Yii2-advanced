<?php

namespace common\models;

use Yii;


class CategoryTranslate extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'category_translate';
    }


    public function rules()
    {
        return [
            [['title', 'meta_tag'], 'required'],
            [['title', 'meta_tag'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'category_id' => Yii::t('backend', 'ID категории'),
            'language' => Yii::t('backend', 'Язык'),
            'title' => Yii::t('backend', 'Заглавие'),
            'meta_tag' => Yii::t('backend', 'Метатег'),
        ];
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
