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
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'category_id' => Yii::t('backend', 'Category ID'),
            'language' => Yii::t('backend', 'Language'),
            'title' => Yii::t('backend', 'Title'),
        ];
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
