<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "op_bitacora".
 *
 * @property int $idop_bitacora
 * @property string $accion
 * @property string $tabla
 * @property string|null $valores_anteriores
 * @property string|null $valores_nuevo
 * @property string $usuario
 * @property string $fecha
 */
class OpBitacora extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'op_bitacora';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['accion', 'tabla', 'usuario', 'fecha'], 'required'],
            [['valores_anteriores', 'valores_nuevo', 'fecha'], 'safe'],
            [['accion', 'tabla', 'usuario'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idop_bitacora' => 'Idop Bitacora',
            'accion' => 'Accion',
            'tabla' => 'Tabla',
            'valores_anteriores' => 'Valores Anteriores',
            'valores_nuevo' => 'Valores Nuevo',
            'usuario' => 'Usuario',
            'fecha' => 'Fecha',
        ];
    }
}
