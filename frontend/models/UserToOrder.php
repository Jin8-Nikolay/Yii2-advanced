<?php
namespace frontend\models;
use Yii;
use yii\db\ActiveRecord;
class UserToOrder extends ActiveRecord{
    public static function tableName()
    {
        return 'user_to_order';
    }
    public function add($userId, $orderId){
        $model = new self();
        $model->user_id = $userId;
        $model->order_id = $orderId;
        $model->save();
        return true;
    }

    public function getOrderList(){
        return self::find()->where(['user_id' => Yii::$app->user->id])->all();
    }
    public function getOrder(){
        return $this->hasOne(Order::className(),['id' => 'order_id']);
    }
}