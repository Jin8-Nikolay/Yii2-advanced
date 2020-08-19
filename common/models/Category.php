<?php

namespace common\models;

use creocoder\translateable\TranslateableBehavior;
use frontend\controllers\MainCategoryController;
use Yii;
use yii\behaviors\TimestampBehavior;
use common\models\MainCategory;


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
                'translationAttributes' => ['title', 'meta_tag']
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
            [['images', 'alias'], 'string'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'main_category_id' => Yii::t('backend', 'ID основной категории'),
            'status' => Yii::t('backend', 'Статус'),
            'index' => Yii::t('backend', 'Индекс'),
            'count_product' => Yii::t('backend', 'Рассчитывать продукт'),
            'created_at' => Yii::t('backend', 'Создано'),
            'updated_at' => Yii::t('backend', 'Обновлен'),
            'images' => Yii::t('backend', 'Фото'),
            'alias' => Yii::t('backend', 'Alias'),
        ];
    }

    public static function findActive(){
        return self::find()->where(['status' => self::$statusActive])->all();
    }

    public function getTranslations(){
        return $this->hasMany(CategoryTranslate::className(), ['category_id' => 'id']);
    }

    public function getMain(){
        return $this->hasOne(MainCategory::className(), ['id' => 'main_category_id']);
    }

    public function getProduct(){
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
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

    public function getImage()
    {
        return ($this->images) ? '/upload/' . $this->images : '/no-image.png';
    }
}
