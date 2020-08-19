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
            [['title', 'meta_tag'], 'required'],
            [['title', 'meta_tag'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'main_category_id' => Yii::t('backend', 'ID основной категории'),
            'language' => Yii::t('backend', 'Язык'),
            'title' => Yii::t('backend', 'Заглавие'),
            'meta_tag' => Yii::t('backend', 'Метатег'),
        ];
    }

    public function getMainCategory(){
        return $this->hasOne(MainCategory::className(), ['id' => 'main_category_id']);
    }
}
