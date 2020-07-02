<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "redirect".
 *
 * @property int $id
 * @property string $from
 * @property string $to
 * @property string $status
 */
class Redirect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'redirect';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from', 'to', 'status'], 'required'],
            [['from', 'to', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'from' => Yii::t('backend', 'From'),
            'to' => Yii::t('backend', 'To'),
            'status' => Yii::t('backend', 'Status'),
        ];
    }
}
