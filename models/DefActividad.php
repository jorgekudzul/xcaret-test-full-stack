<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "def_actividad".
 *
 * @property int $iddef_actividad
 * @property string $nombre
 * @property string $descripcion
 * @property int $iddef_categoria
 * @property int|null $iddef_restricciones
 * @property int|null $estado
 * @property string $usuario_creacion
 * @property string $fecha_creacion
 *
 * @property RelActividadRestriccion $iddefActividad
 * @property DefCategoria $iddefCategoria
 * @property RelProductoActividad $iddefActividad0
 */
class DefActividad extends \app\components\helpers\BActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'def_actividad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'iddef_categoria'], 'required'],
            [['iddef_actividad', 'iddef_categoria', 'iddef_restricciones', 'estado'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['nombre', 'descripcion', 'usuario_creacion'], 'string', 'max' => 45],
            [['iddef_actividad'], 'unique'],
            // [['iddef_actividad'], 'exist', 'skipOnError' => true, 'targetClass' => RelActividadRestriccion::className(), 'targetAttribute' => ['iddef_actividad' => 'iddef_actividad']],
            // [['iddef_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => DefCategoria::className(), 'targetAttribute' => ['iddef_categoria' => 'iddef_categoria']],
            // [['iddef_actividad'], 'exist', 'skipOnError' => true, 'targetClass' => RelProductoActividad::className(), 'targetAttribute' => ['iddef_actividad' => 'iddef_actividad']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddef_actividad' => 'Actividad',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'iddef_categoria' => 'Categoria',
            'iddef_restricciones' => 'Restricciones',
            'estado' => 'Estado',
            'usuario_creacion' => 'Usuario Creacion',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * Gets query for [[IddefActividad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIddefActividad()
    {
        return $this->hasOne(RelActividadRestriccion::className(), ['iddef_actividad' => 'iddef_actividad']);
    }

    /**
     * Gets query for [[IddefCategoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIddefCategoria()
    {
        return $this->hasOne(DefCategoria::className(), ['iddef_categoria' => 'iddef_categoria']);
    }

    /**
     * Gets query for [[IddefActividad0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIddefActividad0()
    {
        return $this->hasOne(RelProductoActividad::className(), ['iddef_actividad' => 'iddef_actividad']);
    }

    public function setRelActividadRestriccion()
    {
        if (!empty($this->iddef_restricciones)) {
            $relacion = new RelActividadRestriccion;
            $relacion->iddef_actividad = $this->iddef_actividad;
            $relacion->iddef_restricciones = $this->iddef_restricciones;
            return $relacion->save();
        }
    }
}
