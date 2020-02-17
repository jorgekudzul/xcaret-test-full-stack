<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rel_actividad_restriccion".
 *
 * @property int $idrel_actividad_restriccion
 * @property int|null $iddef_actividad
 * @property int|null $iddef_restricciones
 * @property int|null $estado
 * @property string $usuario_creacion
 * @property string $fecha_creacion
 *
 * @property DefActividad $defActividad
 * @property RelProductoActividad[] $iddefActividads
 * @property DefRestricciones $defRestricciones
 */
class RelActividadRestriccion extends \app\components\helpers\BActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rel_actividad_restriccion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['idrel_actividad_restriccion', 'usuario_creacion', 'fecha_creacion'], 'required'],
            [['iddef_actividad', 'iddef_restricciones', 'estado'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['usuario_creacion'], 'string', 'max' => 45],
            [['idrel_actividad_restriccion'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idrel_actividad_restriccion' => 'Idrel Actividad Restriccion',
            'iddef_actividad' => 'Iddef Actividad',
            'iddef_restricciones' => 'Iddef Restricciones',
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
        return $this->hasMany(RelProductoActividad::className(), ['iddef_actividad' => 'iddef_actividad'])->viaTable('def_actividad', ['iddef_actividad' => 'iddef_actividad']);
    }

    /**
     * Gets query for [[DefRestricciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDefRestricciones()
    {
        return $this->hasOne(DefRestricciones::className(), ['iddef_restricciones' => 'iddef_restricciones']);
    }
}
