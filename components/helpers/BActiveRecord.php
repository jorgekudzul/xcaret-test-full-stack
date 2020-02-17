<?php
namespace app\components\helpers;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use app\components\behaviors\UserAssingBehavior;
use yii\db\Expression;
use app\components\behaviors\RegistroCambios;

class BActiveRecord extends ActiveRecord
{
    const ESTADO_ACTIVO = 1;
    /**
    * atributo para activar o desactivar el log de cambios
    */
    public $log_cambios = true;

    /**
    * Se especifican los comportamientos que tendrá el objeto al:
    *     * Crear un registro: Se asignarán las fechas de creación así como el usuario que ejecutó el evento.
    *
    *  @return []  [array] Lista de los comportamientos configurados.
    */
    public function behaviors()
    {

        $usuario = (isset(Yii::$app->user) && !Yii::$app->user->getIsGuest()) ? Yii::$app->user->identity->username : null;
        $behaviors = [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    'createdAtAttribute' => 'fecha_creacion',
                    ActiveRecord::EVENT_BEFORE_INSERT => ['fecha_creacion'],
                ],
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => UserassingBehavior::className(),
                'attributes' => [
                    'createdAtAttribute' => 'usuario_creacion',
                    ActiveRecord::EVENT_BEFORE_INSERT => ['usuario_creacion'],
                ],
                'value' => $usuario,
            ],
        ];
        if ($this->log_cambios) {
            $behaviors[] = [
                'class'      => RegistroCambios::className(),
                'modelo'     => ($this),
            ];
        }
        return $behaviors;
    }


    /**
    * metodo para acceder a los controladores y acciones
    * permitidos al usuario
    *
    */
    public function canAccess($actions, $controller = '')
    {

        $role = key(Yii::$app->authManager->getRolesByUser(yii::$app->user->identity['username']));

        $path = Yii::$app->controller->module->controllerNamespace.'\\';

        $controller != '' ? $controllerID = $controller : $controllerID = Yii::$app->controller->id;

        $controller = $path.ucfirst(strtolower($controllerID))."Controller";

        return self::getPermission($role, $controller, $actions);

    }


    /**
    * Función para obtener un arreglo con la(s) columnas solicitadas en un arreglo de modelos,
    * es equivalente a array_column() en un arreglo regular
    * @param Array $modelArray Arreglo con los modelos
    * @param mixed $attributes atributo de las columnas a obtener, también funciona con atributos
    * de modelos relacionados. * Por ejemplo pais.moneda obtendra el atributo moneda de la relación pais
    * ($model->pais->moneda).
    * Si se requiere una sola columna $attribute puede ser un String con el nombre del atributo, si se requiere
    * más de una columna, $attribute debe ser un arreglo con los nombre de los atributos, por default
    * se mapeará cada arreglo de una columna con el nombre del atributo, en caso de requerir un nombre
    * diferente se puede proporcionar como key del atributo en el modelo.
    * @return Array
    */
    public static function getColumn($modelArray, $attributes)
    {
        return array_reduce($modelArray, function ($result, $model) use ($attributes) {
            $getValue = function ($value, $attribute) {
                $attribute = strpos($attribute, '.') === false ? $attribute : explode('.', $attribute);
                if (is_array($attribute)) {
                    foreach ($attribute as $attribute) {
                        $value = $value->$attribute;
                    }
                } else {
                    $value = $value->$attribute;
                }
                return $value;
            };
            if (is_array($attributes)) {
                foreach ($attributes as $key => $attribute) {
                    $key = is_numeric($key) ? $attribute : $key;
                    if (!isset($result[$key])) {
                        $result[$key] = [];
                    }
                    $result[$key][] = $getValue($model, $attribute);
                }
                return $result;
            } else {
                $result[] = $getValue($model, $attributes);
                return $result;
            }
        }, []);
    }
}
