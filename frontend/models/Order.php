<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $patronymic
 * @property string|null $phone
 * @property string|null $email
 * @property float|null $total
 * @property int|null $count
 * @property int|null $status
 * @property string|null $content
 * @property int|null $delivery_id
 * @property int|null $payment_id
 * @property string|null $ip
 * @property string|null $system_info
 * @property string|null $hash
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'count', 'status', 'delivery_id', 'payment_id'], 'integer'],
            [['total'], 'number'],
            [['content', 'system_info'], 'string'],
            [['name', 'surname', 'patronymic', 'phone', 'email', 'ip', 'hash'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'phone' => 'Phone',
            'email' => 'Email',
            'total' => 'Total',
            'count' => 'Count',
            'status' => 'Status',
            'content' => 'Content',
            'delivery_id' => 'Delivery ID',
            'payment_id' => 'Payment ID',
            'ip' => 'Ip',
            'system_info' => 'System Info',
            'hash' => 'Hash',
        ];
    }
}
