<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "def_servicios".
 *
 * @property int $iddef_servicios
 * @property string|null $nombre
 * @property int $iddef_tipo_servicio
 * @property int|null $id_producto
 * @property string|null $descripcion
 * @property string|null $horario
 * @property string|null $latitud
 * @property string|null $longitud
 * @property int|null $estado
 * @property string $usuario_creacion
 * @property string $fecha_creacion
 */
class DefServicios extends \app\components\helpers\BActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'def_servicios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['iddef_tipo_servicio', 'usuario_creacion', 'fecha_creacion'], 'required'],
            [['iddef_tipo_servicio', 'id_producto', 'estado'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['nombre', 'descripcion', 'horario', 'latitud', 'longitud', 'usuario_creacion'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddef_servicios' => 'Servicios',
            'nombre' => 'Nombre',
            'iddef_tipo_servicio' => 'Tipo Servicio',
            'id_producto' => 'Producto',
            'descripcion' => 'Descripcion',
            'horario' => 'Horario',
            'latitud' => 'Latitud',
            'longitud' => 'Longitud',
            'estado' => 'Estado',
            'usuario_creacion' => 'Usuario Creacion',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }
}
