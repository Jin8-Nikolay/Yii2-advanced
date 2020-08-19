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
            'username' => Yii::t('backend', 'Имя пользователя'),
            'name' => Yii::t('backend', 'Название'),
            'surname' => Yii::t('backend', 'Фамилия'),
            'patronymic' => Yii::t('backend', 'Отчество'),
            'phone' => Yii::t('backend', 'Телефон'),
            'email' => Yii::t('backend', 'Эл. адрес'),
            'status' => Yii::t('backend', 'Статус'),
            'role' => Yii::t('backend', 'Роль'),
            'auth_key' => Yii::t('backend', 'Ключ авторизации'),
            'password_hash' => Yii::t('backend', 'Хэш пароля'),
            'password_reset_token' => Yii::t('backend', 'Пароль для сброса пароля'),
            'verification_token' => Yii::t('backend', 'Жетон подтверждения'),
            'created_at' => Yii::t('backend', 'Создано'),
            'updated_at' => Yii::t('backend', 'Обновлен'),
            'last_visit' => Yii::t('backend', 'Последнее посещение'),
        ];
    }
}
