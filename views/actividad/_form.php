<?php

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\form\ActiveForm;
use app\models\DefCategoria;
use app\models\DefRestricciones;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\DefActividad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="def-actividad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iddef_categoria')->dropDownList(
        ArrayHelper::map(DefCategoria::find(["estado"=>1])->asArray()->all(), 'iddef_categoria', 'nombre'),
        ['prompt' => 'seleccionar categoria']
        ) ?>

    <?= $form->field($model, 'iddef_restricciones')->dropDownList(
        ArrayHelper::map(DefRestricciones::find(["estado"=>1])->asArray()->all(), 'iddef_restricciones', 'descripcion'),
        ['prompt' => 'seleccionar restricciones']
        ) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
