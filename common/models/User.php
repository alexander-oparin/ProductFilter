<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $login
 * @property string $pass
 */
class User extends ActiveRecord implements IdentityInterface {
    public $changePass;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['login', 'pass'], 'required'],
            [['login'], 'string', 'max' => 20],
            [['pass'], 'string', 'max' => 100],
            [['id', 'login', 'pass'], 'safe'],
            [['changePass'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['login' => $username]);
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->pass);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->pass = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'pass' => 'Пароль',
            'changePass' => 'Сменить пароль',
        ];
    }
}
