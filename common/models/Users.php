<?php

namespace common\models;

use Yii;

class Users extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'user';
    }


    public function rules()
    {
        return [
            [['status', 'created_at', 'updated_at', 'last_visit'], 'integer'],
            [['username', 'name', 'surname', 'patronymic', 'phone', 'email', 'password_hash', 'password_reset_token', 'verification_token'], 'string', 'max' => 255],
            [['role'], 'string', 'max' => 10],
            [['auth_key'], 'string', 'max' => 32],
        ];
    }


    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'username' => Yii::t('backend', 'Username'),
            'name' => Yii::t('backend', 'Name'),
            'surname' => Yii::t('backend', 'Surname'),
            'patronymic' => Yii::t('backend', 'Patronymic'),
            'phone' => Yii::t('backend', 'Phone'),
            'email' => Yii::t('backend', 'Email'),
            'status' => Yii::t('backend', 'Status'),
            'role' => Yii::t('backend', 'Role'),
            'auth_key' => Yii::t('backend', 'Auth Key'),
            'password_hash' => Yii::t('backend', 'Password Hash'),
            'password_reset_token' => Yii::t('backend', 'Password Reset Token'),
            'verification_token' => Yii::t('backend', 'Verification Token'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'last_visit' => Yii::t('backend', 'Last Visit'),
        ];
    }
}
