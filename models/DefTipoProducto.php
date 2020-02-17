<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "def_tipo_producto".
 *
 * @property int $iddef_tipo_producto
 * @property string|null $tipo
 * @property string|null $descripcion
 * @property int|null $estado
 * @property string $usuario_creacion
 * @property string $fecha_creacion
 *
 * @property Producto[] $productos
 */
class DefTipoProducto extends \app\components\helpers\BActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'def_tipo_producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo', 'descripcion'], 'required'],
            [['iddef_tipo_producto', 'estado'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['tipo', 'descripcion', 'usuario_creacion'], 'string', 'max' => 45],
            [['iddef_tipo_producto'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddef_tipo_producto' => 'Iddef Tipo Producto',
            'tipo' => 'Tipo',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
            'usuario_creacion' => 'Usuario Creacion',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * Gets query for [[Productos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['iddef_tipo_producto' => 'iddef_tipo_producto']);
    }
}
