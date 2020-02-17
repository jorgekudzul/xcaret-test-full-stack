<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rel_producto_actividad".
 *
 * @property int $idrel_producto_actividad
 * @property int|null $id_producto
 * @property int|null $iddef_actividad
 * @property int|null $estado
 * @property string $usuario_creacion
 * @property string $fecha_creacion
 *
 * @property DefActividad $defActividad
 * @property RelActividadRestriccion[] $iddefActividads
 * @property Producto $producto
 */
class RelProductoActividad extends \app\components\helpers\BActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rel_producto_actividad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['idrel_producto_actividad', 'usuario_creacion', 'fecha_creacion'], 'required'],
            [['idrel_producto_actividad', 'id_producto', 'iddef_actividad', 'estado'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['usuario_creacion'], 'string', 'max' => 45],
            [['idrel_producto_actividad'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idrel_producto_actividad' => 'Idrel Producto Actividad',
            'id_producto' => 'Id Producto',
            'iddef_actividad' => 'Iddef Actividad',
            'estado' => 'Estado',
            'usuario_creacion' => 'Usuario Creacion',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * Gets query for [[DefActividad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDefActividad()
    {
        return $this->hasOne(DefActividad::className(), ['iddef_actividad' => 'iddef_actividad']);
    }

    /**
     * Gets query for [[IddefActividads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIddefActividads()
    {
        return $this->hasMany(RelActividadRestriccion::className(), ['iddef_actividad' => 'iddef_actividad'])->viaTable('def_actividad', ['iddef_actividad' => 'iddef_actividad']);
    }

    /**
     * Gets query for [[Producto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['idproducto' => 'idrel_producto_actividad']);
    }
}
