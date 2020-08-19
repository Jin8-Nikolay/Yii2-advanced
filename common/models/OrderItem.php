<?php

namespace common\models;

use Yii;


class OrderItem extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'order_item';
    }


    public function rules()
    {
        return [
            [['order_id', 'product_id', 'count'], 'integer'],
            [['price', 'total'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'order_id' => Yii::t('backend', 'Номер заказа'),
            'product_id' => Yii::t('backend', 'Код товара'),
            'name' => Yii::t('backend', 'Название'),
            'price' => Yii::t('backend', 'Цена'),
            'count' => Yii::t('backend', 'Количество'),
            'total' => Yii::t('backend', 'Заглавие'),
        ];
    }

    public function add($product, $orderId, $count, $total)
    {
        $model = new self;
        $model->order_id = $orderId;
        $model->product_id = $product->id;
        $model->name = $product->short_content;
        if (isset($product->discount_id)){
            $model->price = $product->price - $product->price * $product->discount->value;
        }
        else{
            $model->price = $product->price;
        }
        $model->count = $count;
        $model->total = $total;
        $model->save();
    }

    public function getItemsByOrder($orderId)
    {
        return self::find()->where(['order_id' => $orderId])->all();
    }
}
