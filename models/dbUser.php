<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $user_id
 * @property string $username
 * @property string $password
 * @property string $role
 * @property int $status
 * @property string|null $keterangan
 */
class dbUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'username', 'password', 'role', 'status'], 'required'],
            [['user_id', 'status'], 'integer'],
            [['username', 'password', 'role'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 150],
            [['user_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'Username',
            'password' => 'Password',
            'role' => 'Role',
            'status' => 'Status',
            'keterangan' => 'Keterangan',
        ];
    }
}
