<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int|null $id_padre
 * @property int $idmenu
 * @property string $label
 * @property string $url
 * @property int|null $estado
 * @property string $fecha_creacion
 * @property string $usuario_creacion
 */
class Menu extends \app\components\helpers\BActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_padre', 'idmenu', 'estado'], 'integer'],
            [['label', 'url'], 'required'],
            [['fecha_creacion'], 'safe'],
            [['label', 'url', 'usuario_creacion'], 'string', 'max' => 45],
            [['idmenu'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_padre' => 'Padre',
            'idmenu' => 'Idmenu',
            'label' => 'Label',
            'url' => 'Url',
            'estado' => 'Estado',
            'fecha_creacion' => 'Fecha Creacion',
            'usuario_creacion' => 'Usuario Creacion',
        ];
    }
}
