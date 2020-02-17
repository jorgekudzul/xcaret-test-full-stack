<?php

use macgyer\yii2materializecss\lib\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DefTipoProducto */

$this->title = Yii::t('app', 'Update Tipo Producto: {name}', [
    'name' => $model->iddef_tipo_producto,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddef_tipo_producto, 'url' => ['view', 'id' => $model->iddef_tipo_producto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="def-tipo-producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
