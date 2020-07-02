<?php

namespace common\models;

use Yii;


class MainCategoryTranslate extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'main_category_translate';
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
            'main_category_id' => Yii::t('backend', 'Main Category ID'),
            'language' => Yii::t('backend', 'Language'),
            'title' => Yii::t('backend', 'Title'),
        ];
    }

    public function getMainCategory(){
        return $this->hasOne(MainCategory::className(), ['id' => 'main_category_id']);
    }
}
