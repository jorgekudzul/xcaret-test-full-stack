<?php
namespace app\components\behaviors;

use yii\db\BaseActiveRecord;
use yii\behaviors\AttributeBehavior;

/**
 * La clase se encarga de asignar automáticamente el usuario que  crea o actualiza el registro.
 *
 * Para utilizar la clase se requiere agregar lo siguiente en el ActiveRecord:
 *
 * ```php
 * use app\components\behaviors\UserassingBehavior;
 *
 * public function behaviors()
 * {
 *      [
 *            'class' => UserassingBehavior::className(),
 *        ],
 * }
 * ```
 *
 */
class UserAssingBehavior extends AttributeBehavior
{
    public $createdAtAttribute = 'usuario_creacion';
    public $value;


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (empty($this->attributes)) {
            $this->attributes = [
                BaseActiveRecord::EVENT_BEFORE_INSERT => [$this->createdAtAttribute]
            ];
        }
    }

    /**
     * @inheritdoc
     */
    protected function getValue($event)
    {
        if ($this->value !== null) {
            return $this->value;
        } else {
            return 'admin';
        }
    }
}
