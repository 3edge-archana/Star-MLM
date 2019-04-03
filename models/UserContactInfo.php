<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_contact_info".
 *
 * @property int $id
 * @property int $user_id
 * @property int $residence_phone
 * @property int $office_phone
 * @property int $mobile
 * @property int $email
 * @property int $dated
 * @property int $is_default
 */
class UserContactInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_contact_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'residence_phone', 'office_phone', 'mobile', 'email', 'dated', 'is_default'], 'required'],
            [['user_id', 'residence_phone', 'office_phone', 'mobile', 'email', 'dated', 'is_default'], 'integer'],
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
            'residence_phone' => 'Residence Phone',
            'office_phone' => 'Office Phone',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'dated' => 'Dated',
            'is_default' => 'Is Default',
        ];
    }
}
