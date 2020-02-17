<?php
namespace app\components\behaviors;

use yii;
use yii\db\ActiveRecord;
use yii\base\Behavior;
use app\models\OpBitacora;
use yii\db\Expression;

class RegistroCambios extends Behavior
{
    public $attributes;
    public $id;
    public $modelo;
    public static $usuario = '';

    const EVENT_UPDATE = 'UPDATE';
    const EVENT_INSERT = 'INSERT';
    const EVENT_DELETE = 'DELETE';


    public function init()
    {
        parent::init();
        self::$usuario = (isset(Yii::$app->user) && !Yii::$app->user->getIsGuest()) ? Yii::$app->user->identity->username : 'ADM';
    }

    public function events()
    {
        return [
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeAction',
            ActiveRecord::EVENT_BEFORE_INSERT => 'insertAction',
            ActiveRecord::EVENT_BEFORE_DELETE => 'deleteAction',
        ];
    }

    /**
    * Función que se ejecuta antes de actualizar un registro
    * @return Boolean
    */
    public function beforeAction()
    {
        $registro = $this->modelo;
        $id       = $registro->tableSchema->primaryKey[0];
        $cambios  = $registro->attributes;
        $original = $registro->oldattributes;

        $x = self::populateBitacora([
            'accion' => self::EVENT_UPDATE,
            'tabla' => $this->modelo->tableName(),
            'valores_anteriores' => json_encode($original),
            'valores_nuevo' => json_encode($cambios),
        ]);

        return true;
    }

    /**
    * Función que se ejecuta al momento de hacer un INSERT en la BD
    * @return Boolean
    */
    public function insertAction()
    {
        $registro = $this->modelo;
        $cambios  = $registro->attributes;
        unset($cambios['estado']);
        unset($cambios['fecha_creacion']);
        unset($cambios['usuario_creacion']);
        self::populateBitacora([
            'accion' => self::EVENT_INSERT,
            'tabla' => $this->modelo->tableName(),
            'valores_nuevo' => json_encode($cambios),
        ]);
        return true;
    }

    /**
    * Función que se ejecuta al momento de hacer un DELETE en la BD
    * @return Boolean
    */
    public function deleteAction()
    {
        $registro = $this->modelo;
        $cambios  = $registro->attributes;
        unset($cambios['estado']);
        unset($cambios['fecha_creacion']);
        unset($cambios['usuario_creacion']);
        self::populateBitacora([
            'accion' => self::EVENT_DELETE,
            'tabla' => $this->modelo->tableName(),
            'valores_nuevo' => json_encode($cambios),
        ]);
        return true;
    }

    /**
    * Funcion para ejecutar el SP del log de cambios
    * @param Array $atributos - atributos del modelo OpBitacora, que se cargarán
    * para cargar el registro de la bitácora
    * @return Boolean
    */
    public static function populateBitacora($atributos)
    {
        $bitacora = new OpBitacora;
        $bitacora->attributes = $atributos;
        // $bitacora->tabla = $this->modelo->tableName();
        $bitacora->usuario = self::$usuario;
        $bitacora->fecha = new Expression('NOW()');
        return $bitacora->save();
    }
}
