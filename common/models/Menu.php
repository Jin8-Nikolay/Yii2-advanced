<?php

namespace common\models;

use Yii;


class Menu extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'menu';
    }


    public function rules()
    {
        return [
            [['name', 'key'], 'required'],
            [['content'], 'string', 'on' => 'update'],
            [['content'], 'string', 'on' => 'create'],
            [['name', 'key'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'name' => Yii::t('backend', 'Name'),
            'key' => Yii::t('backend', 'Key'),
            'content' => Yii::t('backend', 'Content'),
        ];
    }
}
