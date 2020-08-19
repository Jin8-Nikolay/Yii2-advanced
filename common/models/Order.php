<?php

namespace common\models;

use frontend\helpers\CartHelper;
use frontend\helpers\UserHelper;
use frontend\models\Cart;
use Yii;


class Order extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'order';
    }

    public function rules()
    {
        return [
            [['user_id', 'count', 'status', 'delivery_id', 'payment_id'], 'integer'],
            [['total'], 'number'],
            [['content', 'system_info'], 'string'],
            [['name', 'surname', 'patronymic', 'phone', 'email', 'ip', 'hash'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'user_id' => Yii::t('backend', 'Логин пользователя'),
            'name' => Yii::t('backend', 'Название'),
            'surname' => Yii::t('backend', 'Фамилия'),
            'patronymic' => Yii::t('backend', 'Отчество'),
            'phone' => Yii::t('backend', 'Телефон'),
            'email' => Yii::t('backend', 'Эл. адрес'),
            'total' => Yii::t('backend', 'Общее количество'),
            'count' => Yii::t('backend', 'Количество'),
            'status' => Yii::t('backend', 'Статус'),
            'content' => Yii::t('backend', 'Содержание'),
            'delivery_id' => Yii::t('backend', 'Идентификатор доставки'),
            'payment_id' => Yii::t('backend', 'Идентификатор платежа'),
            'ip' => Yii::t('backend', 'IP'),
            'system_info' => Yii::t('backend', 'Системная информация'),
            'hash' => Yii::t('backend', 'Гашиш'),
        ];
    }

    public function add(){
        $model = new self;
        if(!Yii::$app->user->isGuest){
            $model->user_id = Yii::$app->user->id;
        }
        $model->name = $this->name;
        $model->surname = $this->surname;
        $model->patronymic = $this->patronymic;
        $model->phone = $this->phone;
        $model->email = $this->email;
        $model->delivery_id = $this->delivery_id;
        $model->payment_id = $this->payment_id;
        $model->hash = Yii::$app->security->generateRandomString(255);
        $model->ip = UserHelper::getIpAddr();
        $model->system_info = UserHelper::getBrowser();
        $model->total = CartHelper::getTotal();
        $model->count = Cart::countProducts();
        $model->status = CartHelper::$statusNew;
        $model->save(false);
    }

    public function getOrder(){
        return self::find()->where(['user_id' => Yii::$app->user->id])->orderBy('id DESC')->one();
    }
}
