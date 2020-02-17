<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "def_categoria".
 *
 * @property int|null $id_padre
 * @property int $iddef_categoria
 * @property string|null $nombre
 * @property string|null $clave
 * @property int|null $estado
 * @property string $usuario_creacion
 * @property string $fecha_creacion
 *
 * @property DefActividad[] $defActividads
 */
class DefCategoria extends \app\components\helpers\BActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'def_categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_padre', 'iddef_categoria', 'estado'], 'integer'],
            // [['usuario_creacion', 'fecha_creacion'], 'required'],
            [['fecha_creacion'], 'safe'],
            [['nombre', 'clave', 'usuario_creacion'], 'string', 'max' => 45],
            [['iddef_categoria'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_padre' => 'Id Padre',
            'iddef_categoria' => 'Categoria',
            'nombre' => 'Nombre',
            'clave' => 'Clave',
            'estado' => 'Estado',
            'usuario_creacion' => 'Usuario Creacion',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * Gets query for [[DefActividads]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDefActividads()
    {
        return $this->hasMany(DefActividad::className(), ['iddef_categoria' => 'iddef_categoria']);
    }
}
