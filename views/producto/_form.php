<?php

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\form\ActiveForm;
use app\models\DefTipoProducto;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'idproducto')->textInput() ?> -->

    <?= $form->field($model, 'clave_producto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_producto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iddef_tipo_producto')->dropDownList(
        ArrayHelper::map(DefTipoProducto::find(["estado"=>1])->asArray()->all(), 'iddef_tipo_producto', 'descripcion'),
        ['prompt' => 'seleccionar padre']
        ) ?>

    <!-- <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'usuario_creacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_creacion')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
