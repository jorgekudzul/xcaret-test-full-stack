<?php

namespace app\models;

use Yii;
use app\components\helpers\BActiveRecord;

/**
 * This is the model class for table "usuario".
 *
 * @property string $username
 * @property string $password
 * @property string $nombre
 * @property string $email
 * @property string|null $authKey
 * @property string|null $accessToken
 * @property int|null $estado
 * @property string $fecha_creacion
 * @property string $usuario_creacion
 */
class Usuario extends BActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'nombre', 'email', 'fecha_creacion', 'usuario_creacion'], 'required'],
            [['estado'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['username'], 'string', 'max' => 25],
            [['password', 'nombre', 'email', 'authKey', 'accessToken', 'usuario_creacion'], 'string', 'max' => 45],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
            'nombre' => 'Nombre',
            'email' => 'Email',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'estado' => 'Estado',
            'fecha_creacion' => 'Fecha Creacion',
            'usuario_creacion' => 'Usuario Creacion',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['username' => $id, 'estado' => static::ESTADO_ACTIVO]);
    }

    /**
     * Búsqueda de usuario por el token indicado.
     *
     * @param $token [string] Token por el que se buscará el usuario.
     * @return IdentityInterface|null Usuario encontrado con el token indicado.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }

    /**
     * @return [string] Devuelve el username del usuario.
     */
    public function getId()
    {
        return $this->username;
    }


    public function getAuthKey()
    {
    }

    /**
     * @param $authKey [authKey] Clave de autentificación.
     * @return boolean
    */
    public function validateAuthKey($authKey)
    {
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
