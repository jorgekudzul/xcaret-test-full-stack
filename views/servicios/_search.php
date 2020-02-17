<?php

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DefServiciosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="def-servicios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddef_servicios') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'iddef_tipo_servicio') ?>

    <?= $form->field($model, 'id_producto') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'horario') ?>

    <?php // echo $form->field($model, 'latitud') ?>

    <?php // echo $form->field($model, 'longitud') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'usuario_creacion') ?>

    <?php // echo $form->field($model, 'fecha_creacion') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
