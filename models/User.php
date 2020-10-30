<?php

namespace app\models;
use app\models\dbUser;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
//    public $id;

    public $user_id;
    public $username;
    public $password;
    public $role;
    public $status;
    public $authKey;
    public $accessToken;
    public $keterangan;

    // private static $users = [
    //     '100' => [
    //         'id' => '100',
    //         'username' => 'admin',
    //         'password' => 'admin',
    //         'authKey' => 'test100key',
    //         'accessToken' => '100-token',
    //     ],
    //     '101' => [
    //         'id' => '101',
    //         'username' => 'demo',
    //         'password' => 'demo',
    //         'authKey' => 'test101key',
    //         'accessToken' => '101-token',
    //     ],
    // ];


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
//        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;

        $user = dbUser::findOne($id);
//        if(count($user)){
//        tanpa array() bakal error
        if(count(array($user))){
            return new static($user);
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $user = dbUser::find()->where(['accessToken'=>$token])->one();
//        if(count($user)){
//        tanpa array() bakal error
        if(count(array($user))){
            return new static($user);
        }
        return null;

        // foreach (self::$users as $user) {
        //     if ($user['accessToken'] === $token) {
        //         return new static($user);
        //     }
        // }

        // return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {

        $user = dbUser::find()->where(['username'=>$username])->one();
//        if(count($user)){
//        tanpa array() bakal error
        if(count(array($user))){
            return new static($user);
        }
        return null;

        // foreach (self::$users as $user) {
        //     if (strcasecmp($user['username'], $username) === 0) {
        //         return new static($user);
        //     }
        // }

        // return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
