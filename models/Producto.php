<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "producto".
 *
 * @property int $idproducto
 * @property string $clave_producto
 * @property string $nombre_producto
 * @property int $iddef_tipo_producto
 * @property int|null $estado
 * @property string $usuario_creacion
 * @property string $fecha_creacion
 *
 * @property DefTipoProducto $iddefTipoProducto
 * @property RelProductoActividad $idproducto0
 */
class Producto extends \app\components\helpers\BActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'producto';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clave_producto', 'nombre_producto', 'iddef_tipo_producto'], 'required'],
            [['idproducto', 'iddef_tipo_producto', 'estado'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['clave_producto', 'nombre_producto', 'usuario_creacion'], 'string', 'max' => 45],
            [['idproducto'], 'unique'],
            [['iddef_tipo_producto'], 'exist', 'skipOnError' => true, 'targetClass' => DefTipoProducto::className(), 'targetAttribute' => ['iddef_tipo_producto' => 'iddef_tipo_producto']],
            [['idproducto'], 'exist', 'skipOnError' => true, 'targetClass' => RelProductoActividad::className(), 'targetAttribute' => ['idproducto' => 'idrel_producto_actividad']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idproducto' => 'Idproducto',
            'clave_producto' => 'Clave Producto',
            'nombre_producto' => 'Nombre Producto',
            'iddef_tipo_producto' => 'Tipo Producto',
            'estado' => 'Estado',
            'usuario_creacion' => 'Usuario Creacion',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * Gets query for [[IddefTipoProducto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIddefTipoProducto()
    {
        return $this->hasOne(DefTipoProducto::className(), ['iddef_tipo_producto' => 'iddef_tipo_producto']);
    }

    /**
     * Gets query for [[Idproducto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdproducto0()
    {
        return $this->hasOne(RelProductoActividad::className(), ['idrel_producto_actividad' => 'idproducto']);
    }
}
