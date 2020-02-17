<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "def_restricciones".
 *
 * @property int $iddef_restricciones
 * @property string|null $descripcion
 * @property int|null $estado
 * @property string $usuario_creacion
 * @property string $fecha_creacion
 *
 * @property RelActividadRestriccion $iddefRestricciones
 */
class DefRestricciones extends \app\components\helpers\BActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'def_restricciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['iddef_restricciones', 'usuario_creacion', 'fecha_creacion'], 'required'],
            [['iddef_restricciones', 'estado'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['descripcion', 'usuario_creacion'], 'string', 'max' => 45],
            [['iddef_restricciones'], 'unique'],
            // [['iddef_restricciones'], 'exist', 'skipOnError' => true, 'targetClass' => RelActividadRestriccion::className(), 'targetAttribute' => ['iddef_restricciones' => 'iddef_restricciones']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddef_restricciones' => 'Restricciones',
            'descripcion' => 'Descripción',
            'estado' => 'Estado',
            'usuario_creacion' => 'Usuario Creacion',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * Gets query for [[IddefRestricciones]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIddefRestricciones()
    {
        return $this->hasOne(RelActividadRestriccion::className(), ['iddef_restricciones' => 'iddef_restricciones']);
    }
}
